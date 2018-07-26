
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('example-component', require('./components/TableComponent.vue'));



class Errors{
	constructor(){
		this.errors = {};
	}

	get(field){
		if(this.errors[field]){
			return this.errors[field][0];
		}
	}

	has(field){
		return this.errors.hasOwnProperty(field);
	}

	any(){
		return Object.keys(this.errors).length > 0;
	}

	record(errors){
		this.errors = errors;
	}

	clear(field){

		if(field) {
			delete this.errors[field];
			return;
		}

		this.errors = {};
	}
}


class Form{

	constructor(data){
		this.originalData = data;

		for(let field in data){
			this[field] = data[field];
		}

		this.errors = new Errors();
	}

	data(){

		let data = {};

		for(let property in this.originalData){
			data[property] = this[property];
		}

		return data;

	}

	reset(){
		for(let field in this.originalData){
			this[field] = '';
		}

		this.errors.clear();
	}

	submit(requestType, url){

		return new Promise((resolve, reject) => {

			axios[requestType](url, this.data())
			.then(response => {
				this.onSuccess(response.data);
				resolve(response.data);
			})
			.catch(error =>{
				this.onFail(error.response.data);
				reject(error.response.data);
			});

		});


	}

	onSuccess(data){

		alert(data.message);

		this.reset();

	}

	onFail(data){
		this.errors.record(data.errors);
	}


}


const app = new Vue({
    el: '#app',

    data: {
 		form: new Form({
 			   	name:'',
    			desc:''
 		}),
    },

    methods:{

    	onSubmit(){
    			this.form.submit('post', '/projects')
    			.then(data => console.log(data))
    			.catch(errors => console.log(errors));
    		
    	}

    }
});










// register the grid component
// Vue.component('demo-grid', {
//   template: `<table>
//     <thead>
//       <tr>
//         <th v-for="key in columns"
//           @click="sortBy(key)"
//           :class="{ active: sortKey == key }">
//           {{ key | capitalize }}
//           <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
//           </span>
//         </th>
//       </tr>
//     </thead>
//     <tbody>
//       <tr v-for="entry in filteredData">
//         <td v-for="key in columns">
//           {{entry[key]}}
//         </td>
//       </tr>
//     </tbody>
//   </table>`,
//   props: {
//     data: Array,
//     columns: Array,
//     filterKey: String
//   },
//   data: function () {
//     var sortOrders = {}
//     this.columns.forEach(function (key) {
//       sortOrders[key] = 1
//     })
//     return {
//       sortKey: '',
//       sortOrders: sortOrders
//     }
//   },
//   computed: {
//     filteredData: function () {
//       var sortKey = this.sortKey
//       var filterKey = this.filterKey && this.filterKey.toLowerCase()
//       var order = this.sortOrders[sortKey] || 1
//       var data = this.data
//       if (filterKey) {
//         data = data.filter(function (row) {
//           return Object.keys(row).some(function (key) {
//             return String(row[key]).toLowerCase().indexOf(filterKey) > -1
//           })
//         })
//       }
//       if (sortKey) {
//         data = data.slice().sort(function (a, b) {
//           a = a[sortKey]
//           b = b[sortKey]
//           return (a === b ? 0 : a > b ? 1 : -1) * order
//         })
//       }
//       return data
//     }
//   },
//   filters: {
//     capitalize: function (str) {
//       return str.charAt(0).toUpperCase() + str.slice(1)
//     }
//   },
//   methods: {
//     sortBy: function (key) {
//       this.sortKey = key
//       this.sortOrders[key] = this.sortOrders[key] * -1
//     }
//   }
// })

// // bootstrap the demo
// var demo = new Vue({
//   el: '#demo',
//   data: {
//     searchQuery: '',
//     gridColumns: ['name', 'power'],
//     gridData: [
//       { name: 'Chuck Norris', power: Infinity },
//       { name: 'Bruce Lee', power: 9000 },
//       { name: 'Jackie Chan', power: 7000 },
//       { name: 'Jet Li', power: 8000 }
//     ]
//   }
// })