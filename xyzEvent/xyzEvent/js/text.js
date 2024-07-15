document.addEventListener("DOMContentLoaded", () => {
  function typeWriter(element, text, delay = 100, callback) {
    let i = 0;
    function typing() {
      if (i < text.length) {
        element.innerHTML += text.charAt(i);
        i++;
        setTimeout(typing, delay);
      } else if (callback) {
        setTimeout(callback, 1000);
      }
    }
    typing();
  }

  function deleteWriter(element, delay = 100, callback) {
    let text = element.innerHTML;
    let i = text.length;
    function deleting() {
      if (i >= 0) {
        element.innerHTML = text.substring(0, i);
        i--;
        setTimeout(deleting, delay);
      } else if (callback) {
        setTimeout(callback, 1000);
      }
    }
    deleting();
  }

  const smallText = "Effortless Coordination";
  const h1Text = "Event Live 2024";
  const smallElement = document.getElementById("animated-small");
  const h1Element = document.getElementById("animated-h1");

  function loop() {
    smallElement.innerHTML = "";
    h1Element.innerHTML = "";

    typeWriter(smallElement, smallText, 100, () => {
      typeWriter(h1Element, h1Text, 100, () => {
        deleteWriter(h1Element, 100, () => {
          deleteWriter(smallElement, 100, loop);
        });
      });
    });
  }

  loop();
});



