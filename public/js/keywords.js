Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute("value");

vm = new Vue({

	el: '#keywords',

	data: {
		keywords: [],
		error: false,
		updated: false,
		keyword: {
			word: '',
			description: ''
		}
	},

	ready: function() {
		this.fetchKeywords();
	},

	methods: {
		fetchKeywords: function() {
			this.$http.get('/api/keywords').then(function(response) {
				// success callback
				this.keywords = response.json();
			}, function(response) {
				// error callback
				this.error = true;
			});
		},

		store: function() {
			this.$http.post('/api/keywords', this.keyword).then(function(response) {
				if (response.status == 200) {
					this.keywords.push(response.json());
					this.keyword = { 
						word: '', 
						description: ''
					};
				}
			});
		},

		update: function(item) {
			this.$http.put('/api/keywords/' + item.id, item).then(function(response) {
				if (response.status == 200) {
					this.updated = true;
				}
			});
		},

		destroy: function(item) {
			this.$http.delete('/api/keywords/' + item.id).then(function(response) {
				if (response.status == 200) {
					index = this.keywords.indexOf(item);
					this.keywords.splice(index, 1);
				}
			});
		}
	}
});