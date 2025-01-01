document.addEventListener('DOMContentLoaded', function() {
    const playButton = document.getElementById('ttsPlayButton');
    const pauseButton = document.getElementById('ttsPauseButton');
    const stopButton = document.getElementById('ttsStopButton');
    
    if (!playButton || !pauseButton || !stopButton) return;

    const speech = new SpeechSynthesisUtterance();
    speech.text = cmpaTTS.title + '. ' + cmpaTTS.content;
    speech.lang = cmpaTTS.lang.replace('_', '-');
    
    let isPaused = false;

    playButton.addEventListener('click', function() {
        if (isPaused) {
            window.speechSynthesis.resume();
        } else {
            window.speechSynthesis.speak(speech);
        }
        playButton.classList.add('hidden');
        pauseButton.classList.remove('hidden');
        stopButton.classList.remove('hidden');
    });

    pauseButton.addEventListener('click', function() {
        window.speechSynthesis.pause();
        isPaused = true;
        pauseButton.classList.add('hidden');
        playButton.classList.remove('hidden');
        playButton.textContent = cmpaTTS.i18n.resume;
    });

    stopButton.addEventListener('click', function() {
        window.speechSynthesis.cancel();
        isPaused = false;
        stopButton.classList.add('hidden');
        pauseButton.classList.add('hidden');
        playButton.classList.remove('hidden');
        playButton.textContent = cmpaTTS.i18n.play;
    });

    speech.addEventListener('end', function() {
        stopButton.classList.add('hidden');
        pauseButton.classList.add('hidden');
        playButton.classList.remove('hidden');
        playButton.textContent = cmpaTTS.i18n.play;
        isPaused = false;
    });
});