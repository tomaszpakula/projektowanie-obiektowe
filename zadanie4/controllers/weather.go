package controllers

import (
	"github.com/labstack/echo/v4"
	"net/http"
	"zadanie4/database"
	"zadanie4/models"
	"zadanie4/services"
)

func GetWeather(c echo.Context) error {
	city := c.QueryParam("city")
	weatherProxy := services.CreateWeatherProxy()
	weather, err := weatherProxy.FetchWeather(city)
	if err == nil {
		if err := database.DB.Create(weather).Error; err != nil {
			return c.JSON(http.StatusInternalServerError, echo.Map{"error": "Could not save weather data"})
		}
		return c.JSON(http.StatusOK, weather)
	}

	var weatherFromDB models.Weather
	result := database.DB.Where("location = ?", city).Last(&weatherFromDB)
	if result.Error != nil {
		return c.JSON(http.StatusNotFound, echo.Map{"error": "City not found"})
	}
	return c.JSON(http.StatusOK, weatherFromDB)
}
