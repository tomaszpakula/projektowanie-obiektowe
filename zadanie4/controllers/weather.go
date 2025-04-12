package controllers

import (
	"github.com/labstack/echo/v4"
	"net/http"
	"strings"
	"zadanie4/database"
	"zadanie4/models"
	"zadanie4/services"
)

func GetWeather(c echo.Context) error {
	cities := strings.Split(c.QueryParam("city"), ",")

	var weatherList []models.Weather

	for _, city := range cities {
		weatherProxy := services.CreateWeatherProxy()
		weather, err := weatherProxy.FetchWeather(city)
		if err == nil {
			if err := database.DB.Create(weather).Error; err != nil {
				return c.JSON(http.StatusInternalServerError, echo.Map{"error": "Could not save weather data"})
			}
			weatherList = append(weatherList, *weather)
		} else {
			var weatherFromDB models.Weather
			result := database.DB.Where("location = ?", city).Last(&weatherFromDB)
			if result.Error != nil {
				weatherList = append(weatherList, models.Weather{
					Location:  city,
					TempC:     0,
					TempF:     0,
					Condition: "Not found",
				})
			} else {
				weatherList = append(weatherList, weatherFromDB)
			}
		}
	}

	return c.JSON(http.StatusOK, weatherList)
}
