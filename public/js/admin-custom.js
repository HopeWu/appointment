const firstTable = document.querySelector('form:first-of-type table');
let thead = document.createElement('thead');
thead.innerHTML = "<tr>\n" +
    "        <th>Start at</th>\n" +
    "        <th>End by</th>\n" +
    "        <th>Price</th>\n" +
    "        <th>Modify</th>\n" +
    "    </tr>";
firstTable.prepend(thead);

//bookableFlags

for(let i = 0; i < bookableFlags.length; i++){
    // to select the weekday label
    let theInput = document.querySelector(`.weekdays input#${i+1}`);
    //let theLable = document.querySelector(`.weekdays label[for=${i+1}]`);
    theInput.setAttribute('value', bookableFlags[i]);
    if (bookableFlags[i]===1){
        theInput.setAttribute('checked', 1);
    }
}