import 'package:ch_05/movie_card.dart';
import 'package:flutter/material.dart';
import 'http_helper.dart';

class MovieList extends StatefulWidget {
  @override
  _MovieListState createState() => _MovieListState();
}

class _MovieListState extends State<MovieList> {
  String result;
  HttpHelper helper;
  int moviesCount;
  List movies;
  final String iconBase = 'https://image.tmdb.org/t/p/w92/';
  final String defaultImage =
      'https://images.freeimages.com/images/large-previews/5eb/movie-clapboard-1184339.jpg';
  Icon visibleIcon = Icon(Icons.search);
  Widget searchBar = Text('Movies');

  @override
  void initState() {
    helper = HttpHelper();
    initialize();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    NetworkImage image;
    return Scaffold(
      appBar: AppBar(title: searchBar, actions: <Widget>[
        IconButton(
          icon: visibleIcon,
          onPressed: () {
            setState(() {
              iconButtonClicked();
            });
          },
        ),
      ],),
      body: ListView.builder(
          itemCount: (this.moviesCount == null) ? 0 : this.moviesCount,
          itemBuilder: (BuildContext context, int position) {
            if (movies[position].posterPath != null) {
              image = NetworkImage(iconBase + movies[position].posterPath);
            } else {
              image = NetworkImage(defaultImage);
            }
            return MovieCard(movie: movies[position], image: image);
          },),
    );
  }

  iconButtonClicked() {
    if (this.visibleIcon.icon == Icons.search) {
      this.visibleIcon = Icon(Icons.cancel);
      this.searchBar = TextField(
        textInputAction: TextInputAction.search,
        onSubmitted: (String text) {
          search(text);
        },
        style: TextStyle(
          color: Colors.white,
          fontSize: 20.0,
        ),
      );
    } else {
      this.visibleIcon = Icon(Icons.search);
      this.searchBar = Text('Movies');
    }
  }

  Future search(text) async {
    movies = await helper.findMovies(text);
    setState(() {
      moviesCount = movies.length;
      movies = movies;
    });
  }

  Future initialize() async {
    movies = List();
    movies = await helper.getUpcoming();
    setState(() {
      moviesCount = movies.length;
      movies = movies;
    });
  }
}
