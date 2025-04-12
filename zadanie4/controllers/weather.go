package controllers

import (
	"github.com/labstack/echo/v4"
	"net/http"
	"zadanie4/database"
	"zadanie4/models"
)

func GetWeather(c echo.Context) error {
	city := c.QueryParam("city")
	var weather models.Weather
	result := database.DB.Where("location = ?", city).Last(&weather)
	if result.Error != nil {
		return c.JSON(http.StatusNotFound, echo.Map{"error": "City not found"})
	}
	return c.JSON(http.StatusOK, weather)
}
