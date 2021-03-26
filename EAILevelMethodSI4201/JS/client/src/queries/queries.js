import { gql } from "apollo-boost";
/**
 * list af all queries to request data to graphql server
 */


 // get all authors

const getAuthorsQuery = gql`
  {
    authors {
      name
      id
    }
  }
`;

// get all books
const getBooksQuery = gql`
  {
    books {
      name
      genre
      id
    }
  }
`;

// insert new data book
const addBookMutation = gql`
  mutation AddBook($name: String!, $genre: String!, $authorId: ID!) {
    addBook(name: $name, genre: $genre, authorId: $authorId) {
      name
      id
    }
  }
`;


// get 1 book by Id
const getBookQuery = gql`
  query GetBook($id: ID) {
    book(id: $id) {
      id
      name
      genre
      author {
        id
        name
        age
        books {
          name
          id
        }
      }
    }
  }
`;

// delete 1 book by Id
const deleteBookMutation = gql`
    mutation DeleteBook($bookId : ID!){
        deleteBook(bookId : $bookId){
            id
        }
      }
`;

// update 1 book by Id
const updateBookMutation = gql`
      mutation UpdateBOok($bookId: String!, $name: String!, $genre: String!){
          updateBook(bookId : $bookId, name: $name, genre: $genre){
              name
              genre
          }
      }
`

export {
  getAuthorsQuery,
  getBooksQuery,
  addBookMutation,
  getBookQuery,
  deleteBookMutation,
  updateBookMutation
};
