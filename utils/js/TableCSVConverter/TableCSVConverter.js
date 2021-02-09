class TableCSVExporter {
    constructor (header, table) {
        this.table = table;
        this.rows = Array.from(table.querySelectorAll("tr"));


        //remove existing header
        this.rows.shift();
        
        //add new header to first index

        var x;
        for(x of Array.from(header.querySelectorAll("tr"))) {
            this.rows.unshift(x);
        }

    }

    convertToCSV () {
        const lines = [];
        const numCols = this._findLongestRowLength();

        for (const row of this.rows) {
            let line = "";

            for (let i = 0; i < numCols; i++) {

                if (row.children[i] !== undefined) {
                    line += TableCSVExporter.parseCell(row.children[i]);
                }

                line += (i !== (numCols - 1)) ? "," : "";
            }

            lines.push(line);
        }

        return lines.join("\n");
    }

    _findLongestRowLength () {
        return this.rows.reduce((l, row) => row.childElementCount > l ? row.childElementCount : l, 0);
    }

    static parseCell (tableCell) {
        let parsedValue = tableCell.textContent;

        // Replace all double quotes with two double quotes
        parsedValue = parsedValue.replace(/"/g, `""`);

        // If value contains comma, new-line or double-quote, enclose in double quotes
        parsedValue = /[",\n]/.test(parsedValue) ? `"${parsedValue}"` : parsedValue;

        return parsedValue;
    }
}

function exportTableToCSV(table, fileNamePrefix){

    //we need to clone because we remove some not needed elements and dont want to override current table
    var newHeader = table.cloneNode(true).tHead;

    //remove input-elements in cell
    for(input of newHeader.querySelectorAll("input")) input.remove();
    //remove label-elements in cell
    for(label of newHeader.querySelectorAll("label")) label.remove();
    //trim cell
    for(row of newHeader.querySelectorAll("th")) {
        row.innerHTML = row.innerHTML.trim();
    }

    const exporter = new TableCSVExporter(newHeader, table);
    const csvOutput = exporter.convertToCSV();
    const csvBlob = new Blob([csvOutput], { type: "text/csv" });
    const blobUrl = URL.createObjectURL(csvBlob);
    const anchorElement = document.createElement("a");

    anchorElement.href = blobUrl;
    anchorElement.download = fileNamePrefix + "-table-export.csv";
    anchorElement.click();

    setTimeout(() => {
        URL.revokeObjectURL(blobUrl);
    }, 500);

}
