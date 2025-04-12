package database

import (
	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
	"zadanie4/models"
)

var DB *gorm.DB

func Connect() {
	var err error
	DB, err = gorm.Open(sqlite.Open("weather.db"), &gorm.Config{})
	if err != nil {
		panic(err)
	}
}

func InitWeather() {
	weathers := []models.Weather{
		{Location: "London", TempC: 13.4, TempF: 56.1, Condition: "Party Cloudy"},
		{Location: "Paris", TempC: 13.4, TempF: 56.1, Condition: "Party Cloudy"},
		{Location: "Cracow", TempC: 13.4, TempF: 56.1, Condition: "Party Cloudy"},
	}
	for _, w := range weathers {
		DB.Create(&w)
	}
}
