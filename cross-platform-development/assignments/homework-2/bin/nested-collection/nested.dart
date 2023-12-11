// Output:
//
// {name: Pizza Mario, cuisine: Italian, ratings: [5.0, 3.5, 4.5], avgRating: 4.333333333333333}
// {name: Chez Anne, cuisine: French, ratings: [5.0, 4.5, 4.0], avgRating: 4.5}
// {name: Navaratna, cuisine: Indian, ratings: [4.0, 4.5, 4.0], avgRating: 4.166666666666667}

import 'dart:convert';
import 'dart:io';

final filepath = 'assignments/homework-2/col.json';

Future read(String filename) async {
  final input = await File(filename).readAsString();
  return json.decode(input)['restaurants'];
}

main() async {
  final restaurants = await read(filepath);

  for (var restaurant in restaurants) {
    var ratings = restaurant['ratings'];
    var ratingSum = ratings.fold(0, (a, b) => a + b);
    var averageRating = ratingSum / ratings.length;

    restaurant['avgRating'] = averageRating;

    print(restaurant);
  }
}
