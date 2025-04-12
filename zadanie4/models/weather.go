package models

import "gorm.io/gorm"

type Weather struct {
	gorm.Model
	Location  string
	TempC     float64
	TempF     float64
	Condition string
}
