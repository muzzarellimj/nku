# Team Project: Climate

## Preparation

### Milestone Calendar

| Milestone | Date | Completion |
|:----------|:-----|:-----------|
| Prepare repository and completion plan | October 27, 2023 | |
| Refactor to remove any code smell | November 3, 2023 | |
| Design, implement, and test favorite locations | November 10, 2023 | |
| Design, implement, and test Celsius conversion | November 17, 2023 | |
| Refine and improve features where applicable | November 24, 2023 | |
| Refine and create PPT presentation | December 1, 2023 | |

## Features

### Favorite a Location

> As a user, I want to save favorite locations to view the weather for so that I can view the current weather in these locations more easily.

This can be implemented by expanding on `city_screen` to allow for a list of saved locations, which can be stored in Firebase per user, and either show (a) a popup recommending they click that city or (b) a preview of the weather in that city. This can be unit tested by creating a mock list of favorite locations and checking that the UI component updates appropriately.

### Conversion to Celsius

> As a user, I want to see the temperature in F* and C* so that the temperature is more accessible to those whom I may be sharing the weather.

This can be implemented by expanding on `city_screen` and `location_screen` to calculate and display Celsius temperatures alongside Fahrenheit. This can be tested by providing some mock Fahrenheit temperatures with known Celsius calculations and ensuring that the UI represents the Celsius conversions appropriately.