const { MongoClient } = require('mongodb');
const { readFileSync } = require('fs');

/* the client, which will be accessed in connection and disconnection functions */
let client = null;

/* the database collection pertinent to this assignment */
let audit = null;

/**
 * Connect to a MongoDB database cluster determined by the input connection information.
 *
 * @param username		the account username.
 * @param password		the account password.
 * @param cluster		the cluster address.
 * @param database		the default database to connect to.
 *
 * @returns {Promise<void>}		a database connection.
 */
async function connect(username, password, cluster, database) {
    /* build the connection string */
    const uri = `mongodb+srv://${username}:${password}@${cluster}/${database}?retryWrites=true&w=majority`;

    /* build the client */
    client = new MongoClient(uri)

    /* await successful client connection */
    await client.connect();

    /* retrieve and store the 'nku-course-audit' collection in the 'audit' field */
    audit = client.db('assignment-2').collection('nku-course-audit');

    /* mark a successful connection */
    console.log('Connection successful.');
}

/**
 * Disconnect from an existing MongoDB database cluster.
 *
 * @returns {Promise<void>} 	a database disconnection.
 */
async function disconnect() {
    await client.close();
}

/**
 * Upload the NKU course audit JSON data from assignment one as multiple documents in the collection.
 *
 * @returns {Promise<void>}		a successful upload of the documents.
 */
async function upload() {
    const data = readFileSync('ase-courses-muzzarelli-michael.json', 'utf8');
    const json = JSON.parse(data);

    const result = await audit.insertMany(json);

    console.log(`...inserted ${result.insertedCount} documents.`);
}

/**
 * Search for and display all course records wherein the professor name matches {@link name}.
 *
 * @param name	the name of the professor to be queried.
 *
 * @returns {Promise<void>}		a collection matching documents.
 */
async function read(name) {
    const query = { professor: name };
    const option = {
        projection: { _id: 0, name: 1, professor: 1 }
    }

    const result = audit.find(query, option);
    const count = await audit.countDocuments(query);

    console.log(`...found ${count} matching documents...`);
    await result.forEach(console.dir);
}

/**
 * Replace the name of a professor ({@link name1}) with another name ({@link name2}).
 *
 * @param name1		the initial name (and filter) value.
 * @param name2		the replacement name value.
 *
 * @returns {Promise<void>}		console confirmation of update status.
 */
async function update(name1, name2) {
    const filter = { professor: name1 };
    const update = {
        $set: {
            professor: name2
        }
    }

    const result = await audit.updateMany(filter, update);

    console.log(`...updated ${result.modifiedCount} documents.`);
}

/**
 * Delete all course records containing the attended: 'T' flag, indicating that the class has already been taken.
 *
 * @returns {Promise<void>}		console confirmation of deletion status.
 */
async function deleteAttended() {
    const filter = { attended: 'T' };

    const result = await audit.deleteMany(filter);

    console.log(`...deleted ${result.deletedCount} matching documents.`);
}