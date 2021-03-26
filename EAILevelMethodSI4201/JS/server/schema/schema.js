const graphql = require("graphql");
const Book = require("../models/book");
const Author = require("../models/author");

// GraphQL Type default
const {
  GraphQLObjectType,
  GraphQLString,
  GraphQLSchema,
  GraphQLID,
  GraphQLInt,
  GraphQLList,
  GraphQLNonNull,
} = graphql;

//costume graphql type

/* 
    Book Type -> membuat tipe data objek book dengan
    return object

*/
const BookType = new GraphQLObjectType({
  name: "Book",
  fields: () => ({
    id: {
      type: GraphQLID,
    },
    name: {
      type: GraphQLString,
    },
    genre: {
      type: GraphQLString,
    },
    author: {
      type: AuthorType,
      resolve(parent, args) {
        return Author.findById(parent.authorId);
      },
    },
  }),
});
/* 
    Author Type -> membuat tipe data objek author
    return object
*/
const AuthorType = new GraphQLObjectType({
  name: "Author",
  fields: () => ({
    id: {
      type: GraphQLID,
    },
    name: {
      type: GraphQLString,
    },
    age: {
      type: GraphQLInt,
    },
    books: {
      type: new GraphQLList(BookType),
      resolve(parent, args) {
        return Book.find({ authorId: parent.id });
      },
    },
  }),
});

/*
    GrahpQL Query Type dengan nama RootQueryType
    Untuk mengembil data yang ada pada DB
    terdapat 4 fields
    
*/
const RootQuery = new GraphQLObjectType({
  name: "RootQueryType",
  fields: {
    /*
        Query book
        return data 1 buku berdasarkan id
    */
    book: {
      type: BookType,
      args: {
        id: {
          type: GraphQLID,
        },
      },
      resolve(parent, args) {
        // code to get data from DB / other source
        return Book.findById(args.id);
      },
    },

    /*
        Query author
        return data 1 author berdasarkan id
    */
    author: {
      type: AuthorType,
      args: {
        id: {
          type: GraphQLID,
        },
      },
      resolve(parent, args) {
        return Author.findById(args.id);
      },
    },
    /*  
        Query books
        return -> daftar semua buku
    
    */
    books: {
      type: new GraphQLList(BookType),
      resolve(parent, args) {
        return Book.find({});
      },
    },
    /*  
        Query authors
        return -> daftar semua author
    
    */
    authors: {
      type: new GraphQLList(AuthorType),
      resolve(parent, args) {
        return Author.find({});
      },
    },
  },
});

/*
    GrahpQL Mutation
    Untuk melakukan perubahan data pada DB seperti update,delete,insert
*/
const Mutation = new GraphQLObjectType({
  name: "Mutation",
  fields: {
    /*
        addAuthor
        @params-> name, age
        Membuat data author baru
        @return -> Author Object
      */
    addAuthor: {
      type: AuthorType,
      args: {
        name: {
          type: new GraphQLNonNull(GraphQLString),
        },
        age: {
          type: new GraphQLNonNull(GraphQLInt),
        },
      },
      resolve(parent, args) {
        let author = new Author({
          name: args.name,
          age: args.age,
        });
        return author.save();
      },
    },
    /*
        addBook
        @params-> name, genre, authorId
        Membuat data author baru
        @return -> Object Book
      */
    addBook: {
      type: BookType,
      args: {
        name: {
          type: new GraphQLNonNull(GraphQLString),
        },
        genre: {
          type: new GraphQLNonNull(GraphQLString),
        },
        authorId: {
          type: new GraphQLNonNull(GraphQLID),
        },
      },
      resolve(parent, args) {
        let book = new Book({
          name: args.name,
          genre: args.genre,
          authorId: args.authorId,
        });
        return book.save();
      },
    },
    /*
        updateBook
        @params-> bookId, genre, name
        Update data book
        @return -> Object Book
    */
    updateBook: {
      type: BookType,
      args: {
        bookId: {
          type: new GraphQLNonNull(GraphQLString),
        },
        genre: {
          type: new GraphQLNonNull(GraphQLString),
        },
        name: {
          type: new GraphQLNonNull(GraphQLString),
        },
      },
      resolve(parent, args) {
        return Book.findByIdAndUpdate(args.bookId, {
          name: args.name,
          genre: args.genre,
        });
      },
    },
    /*
        deleteBook
        @params-> bookId
        Delete data book
        @return -> Object Book
    */
    deleteBook: {
      type: BookType,
      args: {
        bookId: {
          type: new GraphQLNonNull(GraphQLID),
        },
      },
      resolve(parent, args) {
        return Book.findByIdAndDelete(args.bookId);
      },
    },
  },
});

// export query & mutation
module.exports = new GraphQLSchema({
  query: RootQuery,
  mutation: Mutation,
});
