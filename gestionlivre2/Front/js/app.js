const app = Vue.createApp({
  data() {
    return {
      featuredBook: {
        title: "Featured Book Title", 
        description: "Description of the featured book.",
        img: "../assets/img/featured-book.jpg"
      },
      books: [],
      groupedBooks: {}
    };
  },
  methods: {
    fetchBooks() {
      fetch('../fetch_books.php') // Point d'API pour récupérer les livres
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            console.error(data.error);
          } else {
            this.books = data;
            
            // Grouper les livres par genre
            this.groupedBooks = data.reduce((acc, book) => {
              if (!acc[book.genre]) acc[book.genre] = [];
              acc[book.genre].push(book);
              return acc;
            }, {});
          }
        })
        .catch((error) => console.error('Error fetching books:', error));
    }
  },
  mounted() {
    this.fetchBooks(); // Appeler la méthode fetchBooks au moment du montage
  }
});

app.mount('#app');
