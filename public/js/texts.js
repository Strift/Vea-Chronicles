Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute("value");

vm = new Vue({

	el: '#texts',

	data: {
		texts: [],
		error: false,
		updated: false,
		text: {
			title: '',
			content: ''
		}
	},

	ready: function() {
		this.fetchTexts();
	},

	methods: {
		fetchTexts: function() {
			this.$http.get('/api/texts').then(function(response) {
				// success callback
				this.texts = response.json();
			}, function(response) {
				// error callback
				this.error = true;
			});
		},

		store: function() {
			this.$http.post('/api/texts', this.text).then(function(response) {
				if (response.status == 200) {
					this.texts.push(response.json());
					this.text = { 
						title: '', 
						content: ''
					};
				}
			});
		},

		update: function(item) {
			this.$http.put('/api/texts/' + item.id, item).then(function(response) {
				if (response.status == 200) {
					this.updated = true;
				}
			});
		},

		destroy: function(item) {
			this.$http.delete('/api/texts/' + item.id).then(function(response) {
				if (response.status == 200) {
					index = this.texts.indexOf(item);
					this.texts.splice(index, 1);
				}
			});
		}
	}
});