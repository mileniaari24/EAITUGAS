import React, { Component } from 'react';
import { graphql, compose } from 'react-apollo';
import { getAuthorsQuery, addBookMutation, getBooksQuery, deleteBook } from '../queries/queries';

class AddBook extends Component {
    constructor(props) {
        super(props);
        //init state
        this.state = {
            name: '',
            genre: '',
            authorId: ''
        };
    }
    // Display all authors data  
    displayAuthors() {
        var data = this.props.getAuthorsQuery;
        if (data.loading) {
            return (<option disabled>Loading...</option>);
        } else {
            return data.authors.map(author => {
                return (<option key={author.id} value={author.id}>{author.name}</option>);
            });
        }
    }
    submitForm(e) {
        e.preventDefault()
        // send data with addBook query to server
        this.props.addBookMutation({
            variables: {
                name: this.state.name,
                genre: this.state.genre,
                authorId: this.state.authorId
            },
            //execution this query after addBook executed
            refetchQueries: [{ query: getBooksQuery }]
        });
    }
    render() {
        return (
            <form id="add-book" onSubmit={this.submitForm.bind(this)} >
                <div className="field">
                    <label>Nama Barang:</label>
                    <input type="text" onChange={(e) => this.setState({ name: e.target.value })} />
                </div>
                <div className="field">
                    <label>Harga:</label>
                    <input type="text" onChange={(e) => this.setState({ genre: e.target.value })} />
                </div>
                <button>+</button>
            </form>
        );
    }
}

// bind query to component property & export component AddBook
export default compose(
    graphql(getAuthorsQuery, { name: "getAuthorsQuery" }),
    graphql(addBookMutation, { name: "addBookMutation" })
)(AddBook);
