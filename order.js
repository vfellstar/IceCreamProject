// Variables
var sizeSelected = "Small - £1.75";
var quantitySelected = 0;
var selectedFlavour = null;

var totalCost = 0;

toDisplay = "<tr><th>Item       :</th><th>Quantity</th></tr>";
let printCost = "Total Cost: £";

// Selections of flavours

var dairyFreeS = 0;
var dairyFreeM = 0;
var dairyFreeL = 0;
var dairyFreeXL = 0;
var dairyFreeXXL = 0;

var vanillaS = 0;
var vanillaM = 0;
var vanillaL = 0;
var vanillaXL = 0;
var vanillaXXL = 0;

var hcS = 0;
var hcM = 0;
var hcL = 0;
var hcXL = 0;
var hcXXL = 0;

var rrS = 0;
var rrM = 0;
var rrL = 0;
var rrXL = 0;
var rrXXL = 0;

var mintS = 0;
var mintM = 0;
var mintL = 0;
var mintXL = 0;
var mintXXL = 0;

var cherryS = 0;
var cherryM = 0;
var cherryL = 0;
var cherryXL = 0;
var cherryXXL = 0;

var chocolateS = 0;
var chocolateM = 0;
var chocolateL = 0;
var chocolateXL = 0;
var chocolateXXL = 0;

var scS = 0;
var scM = 0;
var scL = 0;
var scXL = 0;
var scXXL = 0;

var strawS = 0;
var strawM = 0;
var strawL = 0;
var strawXL = 0;
var strawXXL = 0;

let orderMap = new Map();

// Sets order into the map.
function setOrder() {
    orderMap.set("Dairy Free (S)", dairyFreeS);
    orderMap.set("Dairy Free (M)", dairyFreeM);
    orderMap.set("Dairy Free (L)", dairyFreeL);
    orderMap.set("Dairy Free (XL)",  dairyFreeXL);
    orderMap.set("Dairy Free (XXL)", dairyFreeXXL);

    orderMap.set("Vanilla (S)", vanillaS);
    orderMap.set("Vanilla (M)",  vanillaM);
    orderMap.set("Vanilla (L)",  vanillaL);
    orderMap.set("Vanilla (XL)", vanillaXL);
    orderMap.set("Vanilla (XXL)", vanillaXXL);

    orderMap.set("Honeycomb(S)",  hcS);
    orderMap.set("Honeycomb (M)",  hcM);
    orderMap.set("Honeycomb(L)", hcL);
    orderMap.set("Honeycomb (XL)", hcXL);
    orderMap.set("Honeycomb(XXL)", hcXXL);

    orderMap.set("Rum Raisin (S)", rrS);
    orderMap.set("Rum Raisin (M)", rrM);
    orderMap.set("Rum Raisin (L)",  rrL);
    orderMap.set("Rum Raisin (XL)", rrXL);
    orderMap.set("Rum Raisin (XXL)", rrXXL);

    orderMap.set("Mint (S)", mintS);
    orderMap.set("Mint (M)", mintM);
    orderMap.set("Mint (L)", mintL);
    orderMap.set("Mint (XL)", mintXL);
    orderMap.set("Mint (XXL)", mintXXL);

    orderMap.set("Cherry (S)", cherryS);
    orderMap.set("Cherry (M)", cherryM);
    orderMap.set("Cherry (L)", cherryL);
    orderMap.set("Cherry (XL)", cherryXL);
    orderMap.set("Cherry (XXL)", cherryXXL);

    orderMap.set("Chocolate (S)", chocolateS);
    orderMap.set("Chocolate (M)", chocolateM);
    orderMap.set("Chocolate (L)", chocolateL);
    orderMap.set("Chocolate (XL)", chocolateXL);
    orderMap.set("Chocolate (XXL)", chocolateXXL);

    orderMap.set("Salted Caramel (S)", scS);
    orderMap.set("Salted Caramel (M)", scM);
    orderMap.set("Salted Caramel (L)",  scL);
    orderMap.set("Salted Caramel (XL)",  scXL);
    orderMap.set("Salted Caramel (XXL)", scXXL);

    orderMap.set("Strawberry (S)", strawS);
    orderMap.set("Strawberry (M)", strawM);
    orderMap.set("Strawberry (L)", strawL);
    orderMap.set("Strawberry (XL)", strawXL);
    orderMap.set("Strawberry (XXL)", strawXXL);
}



// Increase Decrease Button Functions
function increaseSelected() {
    quantitySelected++;
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("quantity-selected2").innerHTML = quantitySelected;
    document.getElementById("quantity-selected3").innerHTML = quantitySelected;
    document.getElementById("quantity-selected4").innerHTML = quantitySelected;
    document.getElementById("quantity-selected5").innerHTML = quantitySelected;
    document.getElementById("quantity-selected6").innerHTML = quantitySelected;
    document.getElementById("quantity-selected7").innerHTML = quantitySelected;
    document.getElementById("quantity-selected8").innerHTML = quantitySelected;
    document.getElementById("quantity-selected9").innerHTML = quantitySelected;
}
function decreaseSelected() {
    if (quantitySelected > 0) {
    quantitySelected--;
    }
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("quantity-selected2").innerHTML = quantitySelected;
    document.getElementById("quantity-selected3").innerHTML = quantitySelected;
    document.getElementById("quantity-selected4").innerHTML = quantitySelected;
    document.getElementById("quantity-selected5").innerHTML = quantitySelected;
    document.getElementById("quantity-selected6").innerHTML = quantitySelected;
    document.getElementById("quantity-selected7").innerHTML = quantitySelected;
    document.getElementById("quantity-selected8").innerHTML = quantitySelected;
    document.getElementById("quantity-selected9").innerHTML = quantitySelected;
}

function changeSelection() {
    document.getElementById("current-selection").innerHTML = selectedFlavour;
}


// Sets size selected.
function size_button_press_small() {
    sizeSelected = "Small - 1.75";
    document.getElementById("size-selected1").innerHTML = sizeSelected;
    document.getElementById("size-selected2").innerHTML = sizeSelected;
    document.getElementById("size-selected3").innerHTML = sizeSelected;
    document.getElementById("size-selected4").innerHTML = sizeSelected;
    document.getElementById("size-selected5").innerHTML = sizeSelected;
    document.getElementById("size-selected6").innerHTML = sizeSelected;
    document.getElementById("size-selected7").innerHTML = sizeSelected;
    document.getElementById("size-selected8").innerHTML = sizeSelected;
    document.getElementById("size-selected9").innerHTML = sizeSelected;
    
}
function size_button_press_medium() {
    sizeSelected = "Medium - 2.25";
    document.getElementById("size-selected1").innerHTML = sizeSelected;
    document.getElementById("size-selected2").innerHTML = sizeSelected;
    document.getElementById("size-selected3").innerHTML = sizeSelected;
    document.getElementById("size-selected4").innerHTML = sizeSelected;
    document.getElementById("size-selected5").innerHTML = sizeSelected;
    document.getElementById("size-selected6").innerHTML = sizeSelected;
    document.getElementById("size-selected7").innerHTML = sizeSelected;
    document.getElementById("size-selected8").innerHTML = sizeSelected;
    document.getElementById("size-selected9").innerHTML = sizeSelected;
}
function size_button_press_large() {
    sizeSelected = "Large - 2.75";
    document.getElementById("size-selected1").innerHTML = sizeSelected;
    document.getElementById("size-selected2").innerHTML = sizeSelected;
    document.getElementById("size-selected3").innerHTML = sizeSelected;
    document.getElementById("size-selected4").innerHTML = sizeSelected;
    document.getElementById("size-selected5").innerHTML = sizeSelected;
    document.getElementById("size-selected6").innerHTML = sizeSelected;
    document.getElementById("size-selected7").innerHTML = sizeSelected;
    document.getElementById("size-selected8").innerHTML = sizeSelected;
    document.getElementById("size-selected9").innerHTML = sizeSelected;
}
function size_button_press_xl() {
    sizeSelected = "XL - 3.50";
    document.getElementById("size-selected1").innerHTML = sizeSelected;
    document.getElementById("size-selected2").innerHTML = sizeSelected;
    document.getElementById("size-selected3").innerHTML = sizeSelected;
    document.getElementById("size-selected4").innerHTML = sizeSelected;
    document.getElementById("size-selected5").innerHTML = sizeSelected;
    document.getElementById("size-selected6").innerHTML = sizeSelected;
    document.getElementById("size-selected7").innerHTML = sizeSelected;
    document.getElementById("size-selected8").innerHTML = sizeSelected;
    document.getElementById("size-selected9").innerHTML = sizeSelected;
}
function size_button_pressxxl() {
    sizeSelected = "XXL - 5.75";
    document.getElementById("size-selected1").innerHTML = sizeSelected;
    document.getElementById("size-selected2").innerHTML = sizeSelected;
    document.getElementById("size-selected3").innerHTML = sizeSelected;
    document.getElementById("size-selected4").innerHTML = sizeSelected;
    document.getElementById("size-selected5").innerHTML = sizeSelected;
    document.getElementById("size-selected6").innerHTML = sizeSelected;
    document.getElementById("size-selected7").innerHTML = sizeSelected;
    document.getElementById("size-selected8").innerHTML = sizeSelected;
    document.getElementById("size-selected9").innerHTML = sizeSelected;
}

// Sets Quantity Selected
function updateQuantitySelected() {
    document.getElementById("quantity-selected").innerHTML = quantitySelected;
}

// Set Flavour Selection
function setToDairyFree() {
    selectedFlavour = "Dairy Free";
    changeSelection();
}
function setToVanilla() {
    selectedFlavour = "Vanilla";
}
function setToHoneycomb() {
    selectedFlavour = "Honeycomb";
}
function setToRR() {
    selectedFlavour = "Rum and Raisin";
}
function setToMint() {
    selectedFlavour = "Mint";
}
function setToCherry() {
    selectedFlavour = "Cherry";
}
function setToChoc() {
    selectedFlavour = "Chocolate";
}
function setToSC() {
    selectedFlavour = "Salted Caramel";
}
function setToStrawb() {
    selectedFlavour = "Strawberry";
}

// Popup Functions
function popup1() {
    
    setToDairyFree();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup1").classList.toggle("active");
}
function popupClose1() {
    enableButtons();
    document.getElementById("popup1")
        .classList.toggle("active");

}

function popup2() {
    setToVanilla();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup2")
        .classList.toggle("active");

}
function popupClose2() {
    document.getElementById("popup2")
        .classList.toggle("active");

}

function popup3() {
    setToHoneycomb();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup3")
        .classList.toggle("active");

}
function popupClose3() {
    document.getElementById("popup3")
        .classList.toggle("active");

}

function popup4() {
    setToRR();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup4")
        .classList.toggle("active");

}
function popupClose4() {
    document.getElementById("popup4")
        .classList.toggle("active");

}

function popup5() {
    setToMint();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup5")
        .classList.toggle("active");

}
function popupClose5() {
    document.getElementById("popup5")
        .classList.toggle("active");

}

function popup6() {
    setToCherry();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup6")
        .classList.toggle("active");

}
function popupClose6() {
    document.getElementById("popup6")
        .classList.toggle("active");

}

function popup7() {
    setToChoc;
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup7")
        .classList.toggle("active");

}
function popupClose7() {
    document.getElementById("popup7")
        .classList.toggle("active");

}

function popup8() {
    setToSC();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup8")
        .classList.toggle("active");

}
function popupClose8() {
    document.getElementById("popup8")
        .classList.toggle("active");

}

function popup9() {
    setToStrawb();
    document.getElementById("quantity-selected1").innerHTML = quantitySelected;
    document.getElementById("popup9")
        .classList.toggle("active");

}
function popupClose9() {
    console.log(quantitySelected);
    document.getElementById("popup9")
        .classList.toggle("active");

}

// Calculations
function setPurchaseAmounts() {
    switch (selectedFlavour) {
        case "Dairy Free":
            switch (sizeSelected) {
                case "Small - 1.75":
                    dairyFreeS = quantitySelected;
                    console.log("Working");
                    console.log(dairyFreeS);
                    break;
                case "Medium - 2.25":
                    dairyFreeM = quantitySelected;
                    break;
                case "Large - 2.75":
                    dairyFreeL = quantitySelected;
                    break;
                case "XL - 3.50":
                    dairyFreeXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    dairyFreeXXL = quantitySelected;
                    break;

            }
            break;

        case "Vanilla":
            switch (sizeSelected) {
                case "Small - 1.75":
                    vanillaS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    vanillaM = quantitySelected;
                    break;
                case "Large - 2.75":
                    vanillaL = quantitySelected;
                    break;
                case "XL - 3.50":
                    vanillaXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    vanillaXXL = quantitySelected;
                    break;
            }
            break;
        case "Honeycomb":
            switch (sizeSelected) {
                case "Small - 1.75":
                    hcS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    hcM = quantitySelected;
                    break;
                case "Large - 2.75":
                    hcL = quantitySelected;
                    break;
                case "XL - 3.50":
                    hcXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    hcXXL = quantitySelected;
                    break;

            }


            break;
        case "Rum and Raisin":
            switch (sizeSelected) {
                case "Small - 1.75":
                    rrS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    rrM = quantitySelected;
                    break;
                case "Large - 2.75":
                    rrL = quantitySelected;
                    break;
                case "XL - 3.50":
                    rrXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    rrXXL = quantitySelected;
                    break;

            }


            break;
        case "Mint":
            switch (sizeSelected) {
                case "Small - 1.75":
                    mintS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    mintM = quantitySelected;
                    break;
                case "Large - 2.75":
                    mintL = quantitySelected;
                    break;
                case "XL - 3.50":
                    mintXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    mintXXL = quantitySelected;
                    break;

            }

            break;
        case "Cherry":
            switch (sizeSelected) {
                case "Small - 1.75":
                    cherryS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    cherryM = quantitySelected;
                    break;
                case "Large - 2.75":
                    cherryL = quantitySelected;
                    break;
                case "XL - 3.50":
                    cherryXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    cherryXXL = quantitySelected;
                    break;

            }


            break;
        case "Chocolate":
            switch (sizeSelected) {
                case "Small - 1.75":
                    chocolateS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    chocolateM = quantitySelected;
                    break;
                case "Large - 2.75":
                    chocolateL = quantitySelected;
                    break;
                case "XL - 3.50":
                    chocolateXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    chocolateXXL = quantitySelected;
                    break;

            }


            break;
        case "Salted Caramel":
            switch (sizeSelected) {
                case "Small - 1.75":
                    scS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    scM = quantitySelected;
                    break;
                case "Large - 2.75":
                    scL = quantitySelected;
                    break;
                case "XL - 3.50":
                    scXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    scXXL = quantitySelected;
                    break;

            }
            break;
        case "Strawberry":
            switch (sizeSelected) {
                case "Small - 1.75":
                    strawS = quantitySelected;
                    break;
                case "Medium - 2.25":
                    strawM = quantitySelected;
                    break;
                case "Large - 2.75":
                    strawL = quantitySelected;
                    break;
                case "XL - 3.50":
                    strawXL = quantitySelected;
                    break;
                case "XXL - 5.75":
                    strawXXL = quantitySelected;
                    break;

            }
            break;

    }
    setOrder();
    for (let [key, value] of orderMap) {
        console.log(key + " " + value);
    }
}



function subTotal() {

}

function calculateCost() {
    let sum = 0;
    for (let salary of Object.values(orderMap)) {
        sum += salary;
    }
    return printCost += sum.toString();
}
function resetPanel() {
    orderMap = new Map();
    dairyFreeS = 0;
    dairyFreeM = 0;
    dairyFreeL = 0;
    dairyFreeXL = 0;
    dairyFreeXXL = 0;

    vanillaS = 0;
    vanillaM = 0;
    vanillaL = 0;
    vanillaXL = 0;
    vanillaXXL = 0;

    hcS = 0;
    hcM = 0;
    hcL = 0;
    hcXL = 0;
    hcXXL = 0;

    rrS = 0;
    rrM = 0;
    rrL = 0;
    rrXL = 0;
    rrXXL = 0;

    mintS = 0;
    mintM = 0;
    mintL = 0;
    mintXL = 0;
    mintXXL = 0;

    cherryS = 0;
    cherryM = 0;
    cherryL = 0;
    cherryXL = 0;
    cherryXXL = 0;

    chocolateS = 0;
    chocolateM = 0;
    chocolateL = 0;
    chocolateXL = 0;
    chocolateXXL = 0;

    scS = 0;
    scM = 0;
    scL = 0;
    scXL = 0;
    scXXL = 0;

    strawS = 0;
    strawM = 0;
    strawL = 0;
    strawXL = 0;
    strawXXL = 0;

    toDisplay = "<tr><th>Items Ordered   :</th><th>       Quantity</th></tr>";
    document.getElementById("checkOrders").innerHTML = toDisplay;

}
function getOrders() {
    totalCost = 0;
    toDisplay = "<tr><th>Items Ordered   :</th><th>       Quantity</th></tr>";
    document.getElementById("checkOrders").innerHTML = toDisplay;
    setOrder();

    let filledMap = new Map();

    for (let [key, value] of orderMap) {

        if (value > 0 && !key.includes("totalOrder")) {
            filledMap.set(key, value);
            console.log(key);
            console.log(value);
        }
    }
 
    for (let [key, value] of filledMap) {
        let table = document.getElementById("checkOrders");
        let row = table.insertRow(1);
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);

        let productName = key + ": ";
        let quantity = value + ".";
        var costOfset = 0;

        cell1.innerHTML = productName;
        cell2.innerHTML = quantity;

        if (productName.includes("(S)")) {
            let amount = 1.75 * Number(value);
            if (productName.includes("Salted")) {
                amount += 0.75;
            }
            costOfset += amount;
        } else if (productName.includes("(M)")) {
            let amount = 2.25 * Number(value);
            if (productName.includes("Salted")) {
                amount += 0.75;
            }
            costOfset += amount;
        } else if (productName.includes("(L)")) {
            let amount = 2.75 * Number(value);
            if (productName.includes("Salted")) {
                amount += 0.75;
            }
            costOfset += amount;
        } else if (productName.includes("(XL)")) {
            let amount = 3.50 * Number(value);
            if (productName.includes("Salted")) {
                amount += 0.75;
            }
            costOfset += amount;
        } else if (productName.includes("(XXL)")) {
            let amount = 5.75 * Number(value);
            if (productName.includes("Salted")) {
                amount += 0.75;
            }
            costOfset += amount;
        }

        console.log(costOfset);
        console.log("-------------------------------------------------------------");
        toDisplay += "</table>";
        totalCost += costOfset;
        document.getElementById("totalCost").innerHTML = "Total: " + parseFloat(Number(totalCost)).toFixed(2);

        orderMap.set("totalOrderCost", totalCost);

    }

}
function confirmBtnPush() {
    setPurchaseAmounts();
    setOrder();
    getOrders();

}
//Submit Order
function getOrders() {

    let obj = Object.create(null);

    for (let [k, v] of orderMap) {
        obj[k] = v;
    }

    var order1 = JSON.stringify(obj);
    location.href = "collection.html";
    window.localStorage.setItem('order', order1);
    window.localStorage.setItem('totalCost', totalCost);
}

// Delivery related functions.
function userDistance() {
    var dis = calDis(getLocation(distance));
    console.log(dis);
    if (dis < 5) {
        getOrders;
    }
    else {
        x.innerHTML = "You're too far away for delivery";
    }
}

function calDis(lon1, lat1, lon2, lat2) {
    var R = 6371; // Radius of the earth in km
    var dLat = (lat2 - lat1).toRad();  // Javascript functions in radians
    var dLon = (lon2 - lon1).toRad();
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c; // Distance in km

    /** Converts numeric degrees to radians */
    if (typeof (Number.prototype.toRad) === "undefined") {
        Number.prototype.toRad = function () {
            return this * Math.PI / 180;
        }
    }
}

function getLocation() {
    navigator.geolocation.getCurrentPosition(coord)
    console.log(coord);
    console.log(
        distance(coord.coords.longitude, coord.coords.latitude, -1.614740, 54.971290));// Bier Keller
};


// show errors for debuging
function locationError(error) {
    var x = document.getElementById("delivery-selection");
    switch (error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "Denied the request for Geolocation. Maybe, ask the user in a more polite way?"
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred :(";
            break;
    }
}

// Setting Buttons
document.getElementById("submit").addEventListener("click", getOrders);