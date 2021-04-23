
//const data = [{
//    "Nombre": "Juan David Sanchez Mancilla ",
//    "Puntos": "1",
//    "Sede": "Copete"
//},
//{
//    "Nombre": "Juan David Sanchez Mancilla ",
//    "Puntos": "2",
//    "Sede": "Carretera"
//},
//{
//    "Nombre": "Juan David Sanchez Mancilla ",
//    "Puntos": "3",
//    "Sede": "Carretera"
//},{
//    Nombre : "Total 3",
//    "Puntos":"total : 6"
//
//}];
//document.getElementById("json").innerHTML = JSON.stringify(data, undefined, 4);

const EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
const EXCEL_EXTENSION = '.xlsx';



downloadAsExcel=()=>{
    const worksheet = XLSX.utils.json_to_sheet(dataExcel);
    const workbook = {
        Sheets: {
            "data": worksheet
        },
        SheetNames: ['data']
    }

    const excelBuffer = XLSX.write(workbook, {bookType: 'xlsx',type:'array'});
    saveAsExcel(excelBuffer, 'myFile');
    dataExcel={};
}



const saveAsExcel = (buffer,filename)=>{

    const data = new Blob([buffer],{type:EXCEL_TYPE});
    saveAs(data,filename+'_export_'+new Date().getTime()+EXCEL_EXTENSION)
}



