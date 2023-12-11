# Read and Understand the Program Structure

## Q: What is the main Widget class displayed when the program begins?

`MovieList` containing a list of the upcoming movies.

## Q: What is the Widget class displayed when we click one of the Card widgets?

`MovieDetail` containing the details of the selected movie.

## Q: What methods does this Flutter application use to switch between pages?

A `MaterialPageRoute` is built and `Navigation#push` is called.

## Q: What method implements the search feature?

The `TextField#onSubmitted` function argument is defined to call `MovieListState#search` which fetches search results from the TMDB API.

## Q: Movie information is in JSON; how can we transform it into Movie list?

Both `HttpHelper#getUpcoming` and `HttpHelper#findMovies` fetch a response from the TMDB API, decode the response as JSON, create a `Map` based on that response, and transform the `Map` to a `List` from the `Movie#fromJson` named constructor.