$(function(){
//inisialisasi
const orderedList = []
let total = 0

const sum = () => {
return orderedList.reduce((accumulator, object) => {
return accumulator + (object.harga * object.qty);
}, 0)
};

const changeQty = (el,inc) => {
// ubah di array
const id = $(el).closest('li')[0].dataset.idn      
}
})