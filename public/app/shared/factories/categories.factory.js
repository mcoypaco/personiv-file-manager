sharedModule
	.factory('Category', ['$http', function($http){
		var urlBase = '/category';
		
		return {
			index: function(){
				return $http.get(urlBase);
			},
			show: function(id){
				return $http.get(urlBase + '/' + id);
			},
			store: function(data){
				return $http.post(urlBase, data);
			},
			update: function(id, data){
				return $http.put(urlBase + '/' + id, data);
			},
			delete: function(id){
				return $http.delete(urlBase + '/' + id);
			},
			search: function(data){
				return $http.post(urlBase + '-search', data);
			},
			userGroups: function(data){
				return $http.post(urlBase + '-user-groups', data);
			},
		};
	}])