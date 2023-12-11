# Refactor the Movie Program

## Refactor the code using Extract Method

I used the [Extract Method](https://refactoring.guru/extract-method) refactoring technique to extract the logic related to clicking the AppBar icon button, search or close, and calling that extracted function within `#setState`.

## Refactor the code using Extract Class

I used the [Extract Class](https://refactoring.guru/extract-class) refactoring technique to extract the `Card` widget from `MovieList...ListView#builder` into a new widget, `MovieCard`, and returning that new widget in `MovieList...ListView#builder`.

## Refactor the code by adding trailing commas

I referred to [this Stack Overflow article](https://stackoverflow.com/questions/64669962/is-there-a-way-to-auto-format-flutter-with-vscode) to enable auto-formatting on save in Flutter projects, but this did not solve the problem completely - Flutter code is being formatted but trailing commas are not added. As such, I referred to [this Stack Overflow article](https://stackoverflow.com/questions/73651862/add-missing-trailing-commas-in-project) to add the code analysis rule `require_trailing_commas: true` and ran command `dart fix --apply` to apply this change.