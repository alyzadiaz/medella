//script from github
//https://github.com/mdn/web-speech-api/tree/master/speak-easy-synthesis


var synth = window.speechSynthesis;

var inputForm = document.querySelector('form');
var inputTxt = document.querySelector('.txt');
var voiceSelect = document.querySelector('select');

/*var pitch = document.querySelector('#pitch');
var pitchValue = document.querySelector('.pitch-value');
var rate = document.querySelector('#rate');
var rateValue = document.querySelector('.rate-value');*/

/*

var voices = [];

function populateVoiceList() {
  voices = synth.getVoices();

  for (i = 0; i < voices.length; i++) {
    var option = document.createElement('option');
    option.textContent = voices[i].name + ' (' + voices[i].lang + ')';

    if (voices[i].default) {
      option.textContent += ' -- DEFAULT';
    }

    option.setAttribute('data-lang', voices[i].lang);
    option.setAttribute('data-name', voices[i].name);
    voiceSelect.appendChild(option);
  }
}

populateVoiceList();
if (speechSynthesis.onvoiceschanged !== undefined) {
  speechSynthesis.onvoiceschanged = populateVoiceList;
}

inputForm.onsubmit = function(event) {
  event.preventDefault();

  var utterThis = new SpeechSynthesisUtterance(inputTxt.value);
  //var utterThis = new SpeechSynthesisUtterance(document.getElementById('diagnosis-summary'));
  var selectedOption = voiceSelect.selectedOptions[0].getAttribute('data-name');
  for (i = 0; i < voices.length; i++) {
    if (voices[i].name === selectedOption) {
      utterThis.voice = voices[i];
    }
  }
  //utterThis.pitch = pitch.value;
  //utterThis.rate = rate.value;
  synth.speak(utterThis);

  inputTxt.blur();
}

*/
window.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('voice-form');
  const input = document.getElementById('speech');
  const voiceSelect = document.getElementById('voices');
  let voices;
  let currentVoice;
  
  const populateVoices = () => {
    const availableVoices = speechSynthesis.getVoices();
    voiceSelect.innerHTML = '';

    availableVoices.forEach(voice => {
    const option = document.createElement('option');
    let optionText = `${voice.name} (${voice.lang})`;
    if (voice.default) {
      optionText += ' [default]';
      if (typeof currentVoice === 'undefined') {
      currentVoice = voice;
      option.selected = true;
      }
    }
    if (currentVoice === voice) {
      option.selected = true;
    }
    option.textContent = optionText;
    voiceSelect.appendChild(option);
    });
    voices = availableVoices;
  };
  
  populateVoices();
  speechSynthesis.onvoiceschanged = populateVoices;
  
  voiceSelect.addEventListener('change', event => {
    const selectedIndex = event.target.selectedIndex;
    currentVoice = voices[selectedIndex];
  });

  form.addEventListener('submit', event => {
    event.preventDefault();
    const toSay = input.value.trim();
    const utterance = new SpeechSynthesisUtterance(toSay);
    speechSynthesis.speak(utterance);
    utterance.voice = currentVoice;
    input.value = '';
  });
});
