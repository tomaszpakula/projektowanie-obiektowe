package controllers

import (
	"github.com/labstack/echo/v4"
	"net/http"
	"zadanie4/services"
)

func GetWeather(c echo.Context) error {
	city := c.QueryParam("city")
	weatherProxy := services.CreateWeatherProxy()
	weather, err := weatherProxy.FetchWeather(city)
	if err != nil {
		return c.JSON(http.StatusBadRequest, echo.Map{"error": err.Error()})
	}

	/*result := database.DB.Where("location = ?", city).Last(&weather)
	if result.Error != nil {
		return c.JSON(http.StatusNotFound, echo.Map{"error": "City not found"})
	}*/
	return c.JSON(http.StatusOK, weather)
}
