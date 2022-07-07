const { ObjectId } = require("mongodb");
const { get: database } = require('../database');

const express = require('express');
const router = express.Router();

router.get('/', async (request, response) => {
	database().collection('user').find({}).toArray((error, result) => {
		if (error) return console.log(error);

		response.status(200).json(result);
	});
});

router.post('/', (request, response) => {
	// append user to database => response.status(201).json(request.body);
	database().collection('user').insertOne({ email: request.body.email, password: request.body.password }, (error, result) => {
		if (error) return console.log(error);

		response.status(201).json({ message: `User ${result.insertedId} successfully inserted.` });
	});
});

// middleware: validate :id as ObjectId, respond with 400 if not
router.all('/:id', (request, response, next) => {
	try {
		request.params.id = new ObjectId(request.params.id);
	} catch (error) {
		return response.status(400).json({ message: `Invalid ObjectId reference: ${request.params.id}` });
	}

	next();
});

router.get('/:id', (request, response) => {
	database().collection('user').findOne({ _id: new ObjectId(request.params.id) }, (error, result) => {
		if (error) return console.log(error);

		if (result === undefined || result === null) {
			response.status(404).json({ message: `Nonexistent ObjectId reference: ${request.params.id}` });
		} else {
			response.status(200).json(result);
		}
	});
});

router.patch('/:id', (request, response) => {
	database().collection('user').updateOne({ _id: new ObjectId(request.params.id) }, { $set: { email: request.body.email, password: request.body.password } }, (error, result) => {
		if (error) return console.log(error);

		if (result.matchedCount === 0) {
			response.status(404).json({ message: `Nonexistent ObjectId reference: ${request.params.id}` })
		} else {
			response.status(200).json({ message: `User ${request.params.id} successfully modified.` });
		}
	});
});

router.delete('/:id', (request, response) => {
	// deleteOne({ _id: request.params.id }) => response.status(200).json({ message: 'user deleted' });
	database().collection('user').deleteOne({ _id: new ObjectId(request.params.id) }, (error, result) => {
		if (error) return console.log(error);

		if (result.deletedCount === 0) {
			response.status(404).json({ message: `Nonexistent ObjectId reference: ${request.params.id}` });
		} else {
			response.status(200).json({ message: `User ${request.params.id} successfully deleted.` });
		}
	});
});

module.exports = router;