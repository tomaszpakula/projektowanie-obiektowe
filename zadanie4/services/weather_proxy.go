package services

import (
	"encoding/json"
	"errors"
	"fmt"
	"github.com/joho/godotenv"
	"net/http"
	"os"
	"zadanie4/models"
)

type WeatherProxy struct {
	APIUrl string
}

func CreateWeatherProxy() *WeatherProxy {
	err := godotenv.Load(".env")
	if err != nil {
		fmt.Println("Could not load .env file", err)
	}
	return &WeatherProxy{
		APIUrl: "http://api.weatherapi.com/v1/current.json",
	}
}

func (w *WeatherProxy) FetchWeather(city string) (*models.Weather, error) {
	apiKey := os.Getenv("API_KEY")
	if apiKey == "" {
		return nil, errors.New("API key not found")
	}

	url := fmt.Sprintf("%s?q=%s&key=%s", w.APIUrl, city, apiKey)
	resp, err := http.Get(url)
	if err != nil {
		return nil, err
	}
	defer resp.Body.Close()
	if resp.StatusCode != http.StatusOK {
		return nil, fmt.Errorf("could not fetch data from API: %v", resp.StatusCode)
	}
	var result map[string]interface{}
	if err := json.NewDecoder(resp.Body).Decode(&result); err != nil {
		return nil, fmt.Errorf("could not parse data from API: %v", resp.StatusCode)
	}

	location, ok := result["location"].(map[string]interface{})
	if !ok {
		return nil, errors.New("location data not found or not in expected format")
	}

	locationName, ok := location["name"].(string)
	if !ok {
		return nil, errors.New("location name not found or not in expected format")
	}

	current, ok := result["current"].(map[string]interface{})
	if !ok {
		return nil, errors.New("current weather data not found or not in expected format")
	}

	tempC, ok := current["temp_c"].(float64)
	if !ok {
		return nil, errors.New("temperature (C) not found or not in expected format")
	}

	tempF, ok := current["temp_f"].(float64)
	if !ok {
		return nil, errors.New("temperature (F) not found or not in expected format")
	}

	condition, ok := current["condition"].(map[string]interface{})
	if !ok {
		return nil, errors.New("condition data not found or not in expected format")
	}

	conditionText, ok := condition["text"].(string)
	if !ok {
		return nil, errors.New("condition text not found or not in expected format")
	}

	weather := &models.Weather{
		Location:  locationName,
		TempC:     tempC,
		TempF:     tempF,
		Condition: conditionText,
	}
	return weather, nil
}
