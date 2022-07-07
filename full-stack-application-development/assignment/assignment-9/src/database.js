const { MongoClient, ServerApiVersion } = require('mongodb');

const client = new MongoClient(process.env.MONGODB_CONNECTION_STRING, {
	serverApi: ServerApiVersion.v1,
	useNewUrlParser: true,
	useUnifiedTopology: true,
});

let database;

function connect(callback) {
	client.connect(error => {
		if (error) return console.log(error);

		database = client.db('assignment-nine');

		console.log('Database connection established...');

		callback();
	});
}

function get() {
	return database;
}

module.exports = { connect, get };