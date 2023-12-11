import 'package:ch_05/movie.dart';
import 'package:flutter/material.dart';

import 'movie_detail.dart';

class MovieCard extends StatelessWidget {
  Movie movie;
  NetworkImage image;

  MovieCard({this.movie, this.image});

  @override
  Widget build(BuildContext context) {
    return Card(
        color: Colors.white,
        elevation: 2.0,
        child: ListTile(
          onTap: () {
            MaterialPageRoute route =
                MaterialPageRoute(builder: (_) => MovieDetail(movie));
            Navigator.push(context, route);
          },
          leading: CircleAvatar(
            backgroundImage: image,
          ),
          title: Text(movie.title),
          subtitle: Text('Released: ' +
              movie.releaseDate +
              ' - Vote: ' +
              movie.voteAverage.toString(),),
        ),);
  }
}
