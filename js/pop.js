var player = null;
var tag = document.createElement('script');
tag.id = 'iframe-api';
tag.src = 'https://www.youtube.com/iframe_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady() {
  player = new YT.Player('existing-iframe-example');
}

var elPopupClose = $('.popup__close');
var elPopupOverlay = $('.popup__overlay');
var elPopupToggle = $('#popup__toggle');
var elPopupToggle1 = $('#popup__toggle1');
var elPopupToggle2 = $('#popup__toggle2');
var elPopupToggle3 = $('#popup__toggle3');
function popupDidClose() {
  if (player !== null) {
    player.pauseVideo();
  }
}

elPopupClose.click(function () {
  elPopupOverlay.css({ display: 'none', visibility: 'hidden', opacity: 0 });
  popupDidClose();
});

elPopupOverlay.click(function (event) {
  event = event || window.event;
  if (event.target === this) {
    elPopupOverlay.css({ display: 'none', visibility: 'hidden', opacity: 0 });
    popupDidClose();
  }
});

elPopupToggle.click(function () {
  elPopupOverlay.css({ display: 'block', visibility: 'visible', opacity: 1 });
});
elPopupToggle1.click(function () {
  elPopupOverlay.css({ display: 'block', visibility: 'visible', opacity: 1 });
});
elPopupToggle2.click(function () {
  elPopupOverlay.css({ display: 'block', visibility: 'visible', opacity: 1 });
});
elPopupToggle3.click(function () {
  elPopupOverlay.css({ display: 'block', visibility: 'visible', opacity: 1 });
});