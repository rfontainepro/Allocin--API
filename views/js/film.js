//TMDB Connexion à l'API

const API_KEY = 'api_key=2f6ac61e7150738c512c43ff4683de43&language=fr'; // Clé d'API (v3 auth) // &language=fr (Pour choisir la langue)
const BASE_URL = 'https://api.themoviedb.org/3';
const API_URL = BASE_URL + '/discover/movie?sort_by=popularity.desc&' + API_KEY;

const IMG_URL = 'https://image.tmdb.org/t/p/w500';
const searchURL = BASE_URL + '/search/movie?' + API_KEY;

//---------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------
// Affichage des acteurs

function showMovies(data) {
  main.innerHTML = '';

  data.forEach(movie => {
      const {title, poster_path, vote_average, overview, id} = movie;
      const movieEl = document.createElement('div');
      movieEl.classList.add('movie');
      movieEl.innerHTML = `

          <img src="${poster_path? IMG_URL+poster_path: "http://via.placeholder.com/1080x1580" }" alt="${title}">

        <div class="scene scene--card">
            <div class="card">
                <div class="movie-info">
                    <h3>${title}</h3>
                    <span class="${getColor(vote_average)}">${vote_average}</span>
                </div>
                
                <div class="overview">
                    <h3>Overview</h3>
                    ${overview}
                    <br/> 
                    <button class="know-more" id="${id}">En Savoir +</button
                </div>
            </div>
        </div>
      
      `

      main.appendChild(movieEl);

      document.getElementById(id).addEventListener('click', () => {
        console.log(id)
        openNav(movie)
      })
  })
}