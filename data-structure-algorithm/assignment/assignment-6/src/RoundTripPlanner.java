
import java.util.Arrays;
import java.util.List;

public class RoundTripPlanner {
	// user inputs for the source and destination
	private int startCityIndex;
	private int endCityIndex;

	// Graph created using the following vertices and edges
	private WeightedGraph<String> flightNetwork;

	// array of vertices
	private String[] cities;
	// array of weighted edges [source][dest][weight]
	private int[][] connections;

	// forward and return route cities lists and cost of trip
	private List<String> forwardRoute;
	private double forwardRouteCost;
	private List<String> returnRoute;
	private double returnRouteCost;

	/*
	 * Constructor:
	 * - Assigns class variables
	 * - Invokes generateRoundTrip() method
	 */
	public RoundTripPlanner(String[] cities, int[][] connections, int startCityIndex, int endCityIndex) {
		/* assign class variables */
		this.cities = cities;
		this.connections = connections;
		this.startCityIndex = startCityIndex;
		this.endCityIndex = endCityIndex;

		/* invoke generateRoundTrip() */
		generateRoundTrip();
	}


	/*
	 * Round trip generator:
	 * - Creates flight network graph
	 * - Updates forward trip path variable and forward trip cost
	 * - Performs necessary actions for return trip planning
	 * - Updates return trip path variable and return trip cost
	 */
	public void generateRoundTrip() {
		/* create flight network graph */
		flightNetwork = new WeightedGraph<>(cities, connections);

		/* build forwardRoutePath, retrieve forward route path and cost */
		WeightedGraph<String>.ShortestPathTree forwardRoutePath = flightNetwork.getShortestPath(startCityIndex);
		forwardRoute = forwardRoutePath.getPath(endCityIndex);
		forwardRouteCost = forwardRoutePath.getCost(endCityIndex);

		/* modify edge weight of those used in forwardPath to Integer.MAX_VALUE */
		for (int i = 0; i < forwardRoute.size() - 1; i++) {
			int u = flightNetwork.getIndex(forwardRoute.get(i));
			int v = flightNetwork.getIndex(forwardRoute.get(i + 1));

			for (Edge edge : flightNetwork.neighbors.get(v)) {
				if (edge.v == u) {
					((WeightedEdge) edge).weight = Integer.MAX_VALUE;
				}
			}
		}

		/* build returnRoutePath, retrieve return route path and cost */
		WeightedGraph<String>.ShortestPathTree returnRoutePath = flightNetwork.getShortestPath(endCityIndex);
		returnRoute = returnRoutePath.getPath(startCityIndex);
		returnRouteCost = returnRoutePath.getCost(startCityIndex);
	}


	/*
	 * Trip viewer:
	 * - prints forward trip in the format:
	 * "Forward trip from A to B: A –> P –> Q –> R –> B"
	 * - prints return trip in the same format:
	 * "Return trip from B to A: B –> S –> T –> U –> A"
	 * - prints the costs for the forward trip, return trip, and total trip in the format:
	 *  "Forward route cost: 200.0"
	 *  "Return route cost: 300.0"
	 *  "Total trip cost: 500.0"
	 */
	public void printRoundTrip() {
		System.out.print("Forward trip from " + cities[startCityIndex] + " to " + cities[endCityIndex] + ": ");

		for (int i = 0; i < forwardRoute.size(); i++) {
			if (i < forwardRoute.size() - 1) {
				System.out.print(forwardRoute.get(i) + " -> ");
			} else {
				System.out.print(forwardRoute.get(i) + "\n");
			}
		}

		System.out.print("Return trip from " + cities[endCityIndex] + " to " + cities[startCityIndex] + ": ");

		for (int i = 0; i < returnRoute.size(); i++) {
			if (i < returnRoute.size() - 1) {
				System.out.print(returnRoute.get(i) + " -> ");
			} else {
				System.out.print(returnRoute.get(i) + "\n");
			}
		}

		System.out.println("Forward route cost: " + forwardRouteCost);
		System.out.println("Return route cost: " + returnRouteCost);
		System.out.println("Total trip cost: " + (forwardRouteCost + returnRouteCost));
	}

	// Returns the forwardRoute class variable
	public List<String> getForwardRoute() {
		return forwardRoute;
	}

	// Returns the returnRoute class variable
	public List<String> getReturnRoute() {
		return returnRoute;
	}

	// Returns the forwardRouteCost class variable
	public double getForwardRouteCost() {
		return forwardRouteCost;
	}

	// Returns the returnRouteCost class variable
	public double getReturnRouteCost() {
		return returnRouteCost;
	}



}
