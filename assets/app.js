/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";
import "bootstrap";

import $ from "jquery";
let count = 0;
const chapitre = parseInt(
  window.location.href.substring(window.location.href.lastIndexOf("/") + 1)
);
//fonction liée à la création du personnage
function checkIfGo() {
  count++;
  if (count === 4) {
    $(".boutonFin").append(
      "<h2>Que l'aventure commence<h2><button class='save btn btn-primary'>Enregistrer les éléments dans la feuille d'aventure et commencer</button>"
    );
  }
}
function calcAbility() {
  if ($(".abexist").length === 0) {
    let result = Math.floor(Math.random() * 6) + 1;
    result += 6;
    $(".ability").after(
      "<p class='abexist' data-value=\"" +
        result +
        '">Votre habilité est de ' +
        result
    );
    checkIfGo();
  }
}
function calcStamina() {
  if ($(".staexist").length === 0) {
    let result1 = Math.floor(Math.random() * 6) + 1;
    result1 += 6;
    let result2 = Math.floor(Math.random() * 6) + 1;
    result2 += 6;
    let result = result1 + result2 + 12;
    $(".stamina").after(
      "<p class='staexist' data-value=\"" +
        result +
        '">Votre endurance est de ' +
        result
    );
    checkIfGo();
  }
}
function calcLuck() {
  if ($(".luexist").length === 0) {
    let result = Math.floor(Math.random() * 6) + 1;
    result += 6;
    $(".luck").after(
      "<p class='luexist' data-value=\"" +
        result +
        '">Votre chance est de ' +
        result
    );
    checkIfGo();
  }
}
function choosedPotion(e) {
  if ($(".poexist").length === 0) {
    let potion = e.target.getAttribute("data-potion");
    switch (potion) {
      case "a":
        $(".potion").after(
          "<p class='poexist' data-value='Potion d'Adresse'>Vous avez choisis la potion d'adresse"
        );
        checkIfGo();
        break;
      case "s":
        $(".potion").after(
          "<p class='poexist' data-value='Potion de Vigueur'>Vous avez choisis la potion de vigueur"
        );
        checkIfGo();
        break;
      case "l":
        $(".potion").after(
          "<p class='poexist' data-value='Potion de Bonne Fortune'>Vous avez choisis la potion de bonne fortune"
        );
        checkIfGo();
        break;
      default:
        break;
    }
  }
}
function saveData() {
  let data = {
    ability: $(".abexist").data("value"),
    stamina: $(".staexist").data("value"),
    luck: $(".luexist").data("value"),
    potion: $(".poexist").data("value"),
  };
  $.ajax({
    type: "POST",
    url: "/ajax",
    data: data,
    dataType: "json",
    success: function (response) {
      window.location.replace("/adventure");
    },
  });
}

//fonction lié aux actions des chapitres
function toggleOutWays() {
  $(".outWays").toggle();
}
function modifyLuck(valeur) {
  let data = { luck: valeur };
  $.ajax({
    type: "POST",
    url: "/ajax/luck",
    data: data,
    dataType: "json",
    success: function (response) {
      console.log("succes");
    },
  });
}
function testLuck() {
  let result =
    Math.floor(Math.random() * 6) + 1 + (Math.floor(Math.random() * 6) + 1);
  let luckValue = $(".luckValue")[0].innerText;
  let index = luckValue.indexOf(" ");
  luckValue = parseInt(luckValue.substring(0, index));
  modifyLuck(luckValue - 1);
  switch (chapitre) {
    case 71:
      console.log(result);
      if (result <= luckValue) {
        alert("Bravo vous avez eu de la chance");
        window.location.replace("/adventure/301");
      } else if (result > luckValue) {
        alert("Quelle dommage vous avez été trop bruyant");
        window.location.replace("/adventure/248");
      }
      break;
    default:
      break;
  }
}
$(document).ready(function () {
  $(".ability").on("click", calcAbility);
  $(".stamina").on("click", calcStamina);
  $(".luck").on("click", calcLuck);
  $(".poability, .postamina, .poluck").on("click", choosedPotion);
  $(".boutonFin").on("click", ".save", saveData);
  if ($(".testLuck").length > 0) {
    toggleOutWays();
    $(".testLuck").on("click", testLuck);
  }
});
