module.exports = {

	template:require('./listing.template.html'),

	props:['video'],

	data:function(){
		return {
			videos:[],
			loading:true,
			loading_more:false,
			count:0,
			skip:0,
			take:10,
			ajax:{
				get:site_url('video/related'),
				count:site_url('video/related/count')
			}
		};
	},

	ready:function(){
		this.getRelatedVideos();
		this.getRelatedCount();
	},

	computed:{

		showLoadMore:function(){
			return this.videos.length < this.count;
		}

	},

	methods:{

		getRelatedVideos:function(callback){
			var self = this;
			this.$http.post(this.ajax.get,{
				video:self.video,
				skip:self.skip,
				take:self.take,
				videos:self.videos
			}).then( function( response ){

				var data = response.data;
					status = response.status;

				if(!self.videos.length) {
					self.videos = data.videos;
				} else {
					_.each(data.videos,function(video){
						self.videos.push(video);
					});
				}

				this.loading = false;
				self.skip = self.skip + 10;

				if(callback && typeof callback === 'function'){
					callback();
				}


			});
		},

		getRelatedCount:function(){
			var self = this;

			this.$http.post(this.ajax.count,{video:this.video}).then(function( response ) {
				self.count = response.data;
			});

		},

		loadMore:function(){
			var self = this;
			self.loading_more = true;

			this.getRelatedVideos(function(){
				self.loading_more = false;
			});

		}
	}

}
