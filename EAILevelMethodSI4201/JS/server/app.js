//import package
const express = require('express');
const {
    graphqlHTTP
} = require('express-graphql');
const schema = require('./schema/schema');
const mongoose = require('mongoose');
const cors = require('cors');
require('dotenv').config();

// init express object
const app = express();

//allow cors request
app.use(cors());

//connect to mongodb
mongoose.connect(process.env.DB_CONNECTION, {
    useNewUrlParser: true,
    useUnifiedTopology: true
})

// check connection to mongodb
mongoose.connection.once('open', () => {
    // run app at port 5000
    app.listen(5000, () => console.log('Connection is success, Now Server is running at http://localhost:5000/graphql'));
})

// use graphql middleware
app.use('/graphql', graphqlHTTP({
    schema,
    graphiql: true
}));