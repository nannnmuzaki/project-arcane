document.getElementById('focusEpisode').addEventListener('click', function() { 
    document.getElementById('focusthisEpisode').scrollIntoView({behavior: "smooth"});
    document.getElementById('focusthisEpisode').focus();
});

const musicControl = document.getElementById('musicControl'); 
const backgroundMusic = document.getElementById('backgroundMusic'); 

let isPlaying = false; 
musicControl.addEventListener('click', function() { 
    if (isPlaying) { 
        backgroundMusic.pause(); 
        musicControl.src = 'assets/sound.png'; 
    } else { 
        backgroundMusic.play(); 
        musicControl.src = 'assets/music.png';
    } 
    isPlaying = !isPlaying; 
});

document.addEventListener("DOMContentLoaded", function() {
    const elements = document.querySelectorAll('.reveal');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    });
    
    elements.forEach(element => {
        observer.observe(element);
    });
    
    const episodeContainer = document.querySelector('.episode-container');

    // Function to load episodes dynamically
    const loadEpisodes = async () => {
        try {
            const response = await fetch('api/episodes.json');
            const episodes = await response.json();
            episodes.forEach(episode => {
                const episodeCard = document.createElement('div');
                episodeCard.classList.add('episode-card');
                episodeCard.innerHTML = `
                    <h3>${episode.title}</h3>
                    <p>${episode.description}</p>
                `;
                episodeContainer.appendChild(episodeCard);
            });
        } catch (error) {
            console.error('Error loading episodes:', error);
        }
    };

    loadEpisodes();
});