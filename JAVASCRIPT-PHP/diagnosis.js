var synth = window.speechSynthesis;

var inputForm = document.querySelector('form');
//var inputTxt = document.querySelector('.txt');
//var inputTxt = document.getElementById("summary").innerText
var voiceSelect = document.getElementById('select');
var inputTxt;

/*
var pitch = document.querySelector('#pitch');
var pitchValue = document.querySelector('.pitch-value');
var rate = document.querySelector('#rate');
var rateValue = document.querySelector('.rate-value');
*/

var voices = [];

function getAllVoices(){
  return new Promise(
    function(resolve, reject){
      let s = window.speechSynthesis;
      let id;

      id = setInterval(() =>{
        if(s.length !== 0){
          resolve(s);
          clearInterval(id);
        }
      }, 10)
    }
  )
}

function populateVoiceList(p) {
  voices = p.getVoices().sort(function (a, b) {
      const aname = a.name.toUpperCase(), bname = b.name.toUpperCase();
      if ( aname < bname ) return -1;
      else if ( aname == bname ) return 0;
      else return +1;
  });
  var selectedIndex = voiceSelect.selectedIndex < 0 ? 0 : voiceSelect.selectedIndex;
  voiceSelect.innerHTML = '';
  for(i = 0; i < voices.length ; i++) {
    var option = document.createElement('option');
    option.textContent = voices[i].name + ' (' + voices[i].lang + ')';
    
    if(voices[i].default) {
      option.textContent += ' -- DEFAULT';
    }

    option.setAttribute('data-lang', voices[i].lang);
    option.setAttribute('data-name', voices[i].name);
    voiceSelect.appendChild(option);
  }
  voiceSelect.selectedIndex = selectedIndex;
}

const a = getAllVoices()
  .then((response) => {
    populateVoiceList(response);
    if (speechSynthesis.onvoiceschanged !== undefined) {
      speechSynthesis.onvoiceschanged = populateVoiceList(response);
      inputTxt = voiceSelect.value;
    }
  });

function speak(){
    if (synth.speaking) {
        console.error('speechSynthesis.speaking');
        return;
    }
    if (inputTxt.value !== '') {
    var utterThis = new SpeechSynthesisUtterance(inputTxt.value);
    utterThis.onend = function (event) {
        console.log('SpeechSynthesisUtterance.onend');
    }
    utterThis.onerror = function (event) {
        console.error('SpeechSynthesisUtterance.onerror');
    }
    var selectedOption = voiceSelect.selectedOptions[0].getAttribute('data-name');
    for(i = 0; i < voices.length ; i++) {
      if(voices[i].name === selectedOption) {
        utterThis.voice = voices[i];
        break;
      }
    }
    utterThis.pitch = 1;
    utterThis.rate = 1;
    synth.speak(utterThis);
  }
}

inputForm.onsubmit = function(event) {
  event.preventDefault();

  speak();

  inputTxt.blur();
}

/*pitch.onchange = function() {
  pitchValue.textContent = pitch.value;
}

rate.onchange = function() {
  rateValue.textContent = rate.value;
}*/

voiceSelect.onchange = function(){
  speak();
}