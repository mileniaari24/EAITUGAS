import React, { Component } from "react";
import { graphql, compose } from "react-apollo";
import {
  getBookQuery,
  deleteBookMutation,
  updateBookMutation,
  getBooksQuery,
} from "../queries/queries";

class BookDetails extends Component {
  constructor(props) {
    super(props);
    // init state
    this.state = {
      name: "",
      genre: "",
      bookId: "",
    };
  }



  updateBookHandler = (bookid) => {
    // send data with updateBook query to server



    this.props.updateBookMutation({
      variables: {
        name: this.state.name,
        genre: this.state.genre,
        bookId: bookid,
      },
      //execution this query after updateBook executed
      refetchQueries: [{ query: getBooksQuery }],
    });
  }

  deleteBookHandler = (id) => {
    // send data with deleteBook query to server
    this.props.deleteBookMutation({
      variables: {
        bookId: id,
      },
      //execution this query after deleteBook executed
      refetchQueries: [{ query: getBooksQuery }],
    });
  };

  displayBookDetails() {
    //receive book data from book query
    const { book } = this.props.data;
    if (book) {
      return (
        <div>
          <h2>{book.name}</h2>
          <p>{book.genre}</p>
          <p>{book.author.name}</p>
          <p>All product by this author:</p>
          <ul className="other-books">
            {book.author.books.map((item) => {
              return <li key={item.id}>{item.name}</li>;
            })}
          </ul>
          <button
            onClick={(e) => {
              e.preventDefault();
              this.deleteBookHandler(book.id);
            }}
          >
            Delete Product
          </button>
          <div className="form">
            <div>
              <input
                placeholder="Book Name"
                name="name"
                onChange={(e) => {
                  this.setState({
                    name: e.target.value,
                  });
                }}
              />
            </div>
            <div>
              <input
                placeholder="Genre"
                name="genre"
                onChange={(e) => {
                  this.setState({
                    genre: e.target.value,
                  });

                }}
              />
            </div>
            <div>
              <button onClick={(e) => {
                e.preventDefault();
                this.updateBookHandler(book.id)
              }}>
                Update Product
              </button>
            </div>
          </div>
        </div>
      );
    } else {
      return <div>No Product Selected...</div>;
    }
  }
  render() {
    return <div id="book-details">{this.displayBookDetails()}</div>;
  }
}

// bind query to component property & export component BookDetails
export default compose(
  graphql(deleteBookMutation, { name: "deleteBookMutation" }),
  graphql(updateBookMutation, { name: "updateBookMutation" }),
  graphql(getBookQuery, {
    // receive props from parent component
    options: (props) => {
      return {
        variables: {
          id: props.bookId,
        },
      };
    },
  })
)(BookDetails);
