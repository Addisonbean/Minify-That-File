for ( var i = 0; i < geometry.faces.length; i ++ ) {

	f  = geometry.faces[ i ];
	f2 = geometry2.faces[ i ];
	f3 = geometry3.faces[ i ];

	n = ( f instanceof THREE.Face3 ) ? 3 : 4;

	for( var j = 0; j < n; j++ ) {

		vertexIndex = f[ faceIndices[ j ] ];

		p = geometry.vertices[ vertexIndex ];

		color = new THREE.Color( 0xffffff );
		color.setHSL( ( p.y / radius + 1 ) / 2, 1.0, 0.5 );

		f.vertexColors[ j ] = color;

		color = new THREE.Color( 0xffffff );
		color.setHSL( 0.0, ( p.y / radius + 1 ) / 2, 0.5 );

		f2.vertexColors[ j ] = color;

		color = new THREE.Color( 0xffffff );
		color.setHSL( 0.125 * vertexIndex/geometry.vertices.length, 1.0, 0.5 );

		f3.vertexColors[ j ] = color;

	}

}


var materials = [

	new THREE.MeshLambertMaterial( { color: 0xffffff, shading: THREE.FlatShading, vertexColors: THREE.VertexColors } ),
	new THREE.MeshBasicMaterial( { color: 0x000000, shading: THREE.FlatShading, wireframe: true, transparent: true } )

];

group1 = THREE.SceneUtils.createMultiMaterialObject( geometry, materials );
group1.position.x = -400;
group1.rotation.x = -1.87;
scene.add( group1 );

group2 = THREE.SceneUtils.createMultiMaterialObject( geometry2, materials );
group2.position.x = 400;
group2.rotation.x = 0;
scene.add( group2 );

group3 = THREE.SceneUtils.createMultiMaterialObject( geometry3, materials );
group3.position.x = 0;
group3.rotation.x = 0;
scene.add( group3 );

renderer = new THREE.WebGLRenderer( { antialias: true } );
renderer.setClearColor( 0xffffff );
renderer.setSize( window.innerWidth, window.innerHeight );

container.appendChild( renderer.domElement );

stats = new Stats();
stats.domElement.style.position = 'absolute';
stats.domElement.style.top = '0px';
container.appendChild( stats.domElement );

document.addEventListener( 'mousemove', onDocumentMouseMove, false );

window.addEventListener( 'resize', onWindowResize, false );