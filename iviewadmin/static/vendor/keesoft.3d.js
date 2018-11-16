var KeeSoft3D = function (_dom) {

    var that = this;
    var width = 900;
    var height = 800;
    that.scene;
    var renderer = new THREE.WebGLRenderer({
        antialias: true,       //是否开启反锯齿
        precision: "highp",    //着色精度选择
        alpha: true,           //是否可以设置背景色透明
        preserveDrawingBuffer: true,//是否保存绘图缓冲，若设为true，则可以提取canvas绘图的缓冲
        canvas: document.getElementById(_dom)
    });
    
    renderer.setSize(width, height);
    renderer.shadowMap.enabled = true;

    var camera = new THREE.PerspectiveCamera(45, width/ height, 0.5, 10000, 0.5);
    camera.position.set(0, 10, 160);
    var scene = new THREE.Scene();
    scene.add(camera);

    that.scene = scene;


    function initLight() {

        var ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
        scene.add(ambientLight);

        var directionalLight1 = new THREE.DirectionalLight(0xffffff);
        directionalLight1.position.set(0, 0, 30);
        directionalLight1.position.normalize();
        scene.add(directionalLight1);

        var directionalLight = new THREE.DirectionalLight(0xeeeeee);
        directionalLight.position.set(5, 5, - 5);
        directionalLight.position.normalize();
        scene.add(directionalLight);
    }
    initLight();

    var controls = new THREE.OrbitControls(camera, renderer.domElement);

    controls.enableDamping = true; // an animation loop is required when either damping or auto-rotation are enabled
    controls.dampingFactor = 0.25;

    controls.screenSpacePanning = false;

    controls.minDistance = 100;
    controls.maxDistance = 5000

    function animate() {

        requestAnimationFrame(animate);

        controls.update();

        renderer.render(scene, camera);
    }

    animate();

    var loadTexture = function (_data) {
        var data = _data;
        var texture1 = data.texture;
        texture1.repeat = 100;

        var texture = new THREE.TextureLoader().load(texture1.src);
        texture.rotation = texture1.deg;
        texture.wrapS = THREE.RepeatWrapping;
        texture.wrapT = THREE.RepeatWrapping;
        texture.offset.set(0, 0);
        texture.repeat.set(texture1.repeat, texture1.repeat);
        texture.name = texture1.name;

        return texture;
    }

    var createMesh = function (_m, _data) {

        var texture = loadTexture(_data);

        var sphereMaterial = new THREE.MeshLambertMaterial({
            map: texture,
            side: THREE.DoubleSide,
            ambient:0x666666
        });

        _m.traverse(function (child) {
            if (child instanceof THREE.Mesh) {
                child.material = sphereMaterial
            }
        });

        //_m.position.y = -100;
        that.scene.add(_m);
    }

    this.loadModel = function (_data) {
        for (var k in scene.children) {
        }    
        var objLoader = new THREE.OBJLoader();

        objLoader.load(_data.model.src, function (_m) {

            createMesh(_m, _data);
        });
    }

    // window.addEventListener('resize', onResize, false);

    // function onResize() {
    //     camera.aspect = width / height;
    //     camera.updateProjectionMatrix();
    //     renderer.setSize(width, height);
    // }

}