let app = {
    foodToAdd: {},
    foodFromStorage: null,
    foodElementCounter: 0,
    totalPrice: 0,
    init: function () {
        app.autoLoadCity();
        let addFoodButton = document.querySelectorAll(".add-food_button");
        if (addFoodButton.length > 0) {
            app.gettingCartFromStorage();
            app.displayFoodFromStorage();
            for (let oneButton of addFoodButton) {
                oneButton.addEventListener("mousedown", app.handleAddButton);
            };
            for (let oneButton of addFoodButton) {
                oneButton.addEventListener("mouseup", function () {
                    window.location.reload();
                });
            };
            let removeFoodButtons = document.querySelectorAll(".remove-food");
            for (let oneButton of removeFoodButtons) {
                oneButton.addEventListener("click", app.handleRemoveButton);
            };
            let emptyCartElement = document.querySelector(".empty_cart");
            if (app.foodElementCounter === 0) {
                emptyCartElement.style.display = "block";
            } else {
                emptyCartElement.style.display = "none";
            }
            app.getTotalPrice();
        }
        let orderStateContainer = document.querySelector(".order_state-container");
        if (orderStateContainer) {
            app.orderStateUpdate();
        }
    },
    handleAddButton: function (evt) {
        currentButtonClicked = evt.currentTarget;
        let foodContainer = currentButtonClicked.closest(".cart_add");
        let foodTitle = foodContainer.querySelector(".shop-food-thumbnail__title").textContent;
        let foodPrice = foodContainer.querySelector(".shop-food-price_select").textContent;
        let foodSize = foodContainer.querySelector(".shop-food-size_select");
        foodSize = foodSize.options[foodSize.selectedIndex].textContent;
        let foodPastry = foodContainer.querySelector(".shop-food-pastry_select");
        foodPastry = foodPastry.options[foodPastry.selectedIndex].textContent;
        let foodBase = foodContainer.querySelector(".shop-food-base_select");
        foodBase = foodBase.options[foodBase.selectedIndex].textContent;
        let foodAmount = parseInt(foodContainer.querySelector(".shop-food-amount_select").value);
        let newFoodToAdd = {};
        newFoodToAdd["title"] = foodTitle;
        newFoodToAdd["size"] = foodSize;
        newFoodToAdd["pastry"] = foodPastry;
        newFoodToAdd["base"] = foodBase;
        newFoodToAdd["amount"] = foodAmount;
        newFoodToAdd["price"] = foodPrice;
        if (app.foodToAdd[foodTitle]) {
            if (
                app.foodToAdd[foodTitle].title === foodTitle &&
                app.foodToAdd[foodTitle].size === foodSize &&
                app.foodToAdd[foodTitle].pastry === foodPastry &&
                app.foodToAdd[foodTitle].base === foodBase
            ) {
                app.foodToAdd[foodTitle].amount += foodAmount;
                app.addFoodToCart();
                console.log(app.foodToAdd[foodTitle].amount);
            }
        } else {
            app.foodToAdd[foodTitle] = newFoodToAdd;
            app.addFoodToCart();
        }
    },
    addFoodToCart: function () {
        let footToAdd = JSON.stringify(app.foodToAdd);
        localStorage.setItem("foodCart", footToAdd);
    },
    gettingCartFromStorage: function () {
        app.foodFromStorage = JSON.parse(localStorage.getItem("foodCart"));
    },
    displayFoodFromStorage: function () {
        if (app.foodFromStorage !== null) {
            for (let foodFromStorage in app.foodFromStorage) {
                app.createNewFoodToCart(foodFromStorage);
            }
        }
    },
    createNewFoodToCart: function (foodFromStorage) {
        let templateElement = document.querySelector(".food-cart_template");
        let newElement = templateElement.content.cloneNode(true);
        let foodAmountCartElement = newElement.querySelector(".food_nb");
        let foodTitleCartElement = newElement.querySelector(".food_title");
        let foodPriceCartElement = newElement.querySelector(".food_cost");
        let foodSizeCartElement = newElement.querySelector(".food_size");
        let foodPastryCartElement = newElement.querySelector(".food_pastry");
        foodAmountCartElement.textContent = app.foodFromStorage[foodFromStorage].amount;
        foodTitleCartElement.textContent = app.foodFromStorage[foodFromStorage].title;
        foodPriceCartElement.textContent = app.foodFromStorage[foodFromStorage].price;
        foodSizeCartElement.textContent = app.foodFromStorage[foodFromStorage].size;
        foodPastryCartElement.textContent = app.foodFromStorage[foodFromStorage].pastry;
        let elementContainer = document.querySelector(".template_container");
        elementContainer.appendChild(newElement);
        let newFoodToAdd = {};
        newFoodToAdd["title"] = app.foodFromStorage[foodFromStorage].title;
        newFoodToAdd["size"] = app.foodFromStorage[foodFromStorage].size;
        newFoodToAdd["pastry"] = app.foodFromStorage[foodFromStorage].pastry;
        newFoodToAdd["base"] = app.foodFromStorage[foodFromStorage].base;
        newFoodToAdd["amount"] = app.foodFromStorage[foodFromStorage].amount;
        newFoodToAdd["price"] = app.foodFromStorage[foodFromStorage].price;
        if (app.foodToAdd[app.foodFromStorage[foodFromStorage].title]) {} else {
            app.foodToAdd[app.foodFromStorage[foodFromStorage].title] = newFoodToAdd;
        }
        app.foodElementCounter += 1;
    },
    handleRemoveButton: function (evt) {
        let foodToUnset = evt.currentTarget.closest(".food-cart_container").querySelector(".food_title").textContent
        delete app.foodToAdd[foodToUnset];
        localStorage.removeItem(foodToUnset)
        let footToAdd = JSON.stringify(app.foodToAdd);
        localStorage.setItem("foodCart", footToAdd);
        window.location.reload();
    },
    getTotalPrice: function () {
        totalPrice = 0;
        let allCartElements = document.querySelectorAll(".food-cart_container");
        for (let oneCartElement of allCartElements) {
            let currentNumber = parseInt(oneCartElement.querySelector(".food_nb").textContent);
            let eachPrice = parseFloat(oneCartElement.querySelector(".food_cost").textContent);
            totalPrice += currentNumber * eachPrice;
        }
        let totalElement = document.querySelector(".total_cost");
        totalElement.textContent = totalPrice;
    },
    autoLoadCity: function () {
        let messageElement = document.querySelector(".city-form_message");
        if (messageElement) {
            setTimeout(function () {
                document.findCity.submit();
            }, 1000);
        }
    },
    orderStateUpdate: function() {
        let stepElement1 = document.querySelector(".order_state-1");
        let stepElement2 = document.querySelector(".order_state-2");
        let stepElement3 = document.querySelector(".order_state-3");
        let stepElement4 = document.querySelector(".order_state-4");
        setTimeout( function() {
            console.log("order_state-1");
            stepElement1.style.backgroundColor = "#1f5c24";
        },1000);
        setTimeout( function() {
            console.log("order_state-2");
            stepElement2.style.backgroundColor = "#1f5c24";
            stepElement1.style.backgroundColor = "rgb(58, 58, 58)";
        },2000);
        setTimeout( function() {
            console.log("order_state-3");
            stepElement3.style.backgroundColor = "#1f5c24";
            stepElement2.style.backgroundColor = "rgb(58, 58, 58)";
        },3000);
        setTimeout( function() {
            console.log("order_state-4");
            stepElement4.style.backgroundColor = "#1f5c24";
            stepElement3.style.backgroundColor = "rgb(58, 58, 58)";
        },4000);
        setTimeout( function() {
            console.log("votre commande est prête");
            console.log(window.location.href);
            let redirectUrl = window.location.href + "ready";
            document.location.href = redirectUrl;
        },6000);
    }
}
document.addEventListener("DOMContentLoaded", app.init)