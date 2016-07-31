Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute("value");

vm = new Vue({

	el: '#keywords',

	data: {
		keywords: [],
		error: false,
		keyword: {
			word: '',
			description: ''
		},
		validationErrors: {
			word: '',
			creationDescription: '',
			updateDescription: ''
		},
		editedId: null
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
				this.keywords.push(response.json());
				this.keyword = { 
					word: '', 
					description: ''
				};
				this.validationErrors = {word: '', description: ''};
			}, function(response) {
				if (response.status == 422) {
					content = response.json();
					this.validationErrors.word = content.word;
					this.validationErrors.creationDescription = content.description;
				}
			});
		},

		update: function(item) {
			this.editedId = item.id;
			this.$http.put('/api/keywords/' + item.id, item).then(function(response) {
				this.validationErrors.updateDescription = '';
				this.editedId = null;
			}, function(response) {
				if (response.status == 422) {
					content = response.json();
					this.validationErrors.updateDescription = content.description;
					console.log(this.validationErrors.updateDescription)
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
		},

		isEditing: function(item) {
			return (item.id === this.editedId);
		}
	}
});