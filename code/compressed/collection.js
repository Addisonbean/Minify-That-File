var collection=function(){var a=[],b=[];return{get:function(c){var d=a.indexOf(c);return d>=0?b[d]:void 0},set:function(c,d){var e=a.indexOf(c);0>e&&(e=a.length),a[e]=c,b[e]=d},remove:function(c){var d=a.indexOf(c);d>=0&&(a.splice(d,1),b.splice(d,1))}}}();