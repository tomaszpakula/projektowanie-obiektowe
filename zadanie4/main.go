package main

import (
	"github.com/labstack/echo/v4"
	"gorm.io/gorm"
	"zadanie4/controllers"
	"zadanie4/database"
	"zadanie4/models"
)

type App struct {
	DB *gorm.DB
}

func main() {
	e := echo.New()
	database.Connect()
	database.DB.AutoMigrate(&models.Weather{})
	//init database with data from list
	database.InitWeather()
	e.GET("/weather", controllers.GetWeather)
	e.Logger.Fatal(e.Start(":8080"))
}
