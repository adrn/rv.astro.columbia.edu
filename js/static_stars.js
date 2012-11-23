var g;
var pxs = new Array();
var rint = 60;
var numStars = 600;

function Star(context) {
    this.s = {ttl:8000, xmax:5, ymax:2, rmax:10, rt:1, xdef:960, ydef:540, xdrift:4, ydrift: 4, random:true, blink:true};

    this.reset = function() {
        this.x = (this.s.random ? context.canvas.width*Math.random() : this.s.xdef);
        this.y = (this.s.random ? context.canvas.height*Math.random() : this.s.ydef);
        this.r = ((this.s.rmax-1)*Math.random()) + 1;
        this.dx = (Math.random()*this.s.xmax) * (Math.random() < .5 ? -1 : 1);
        this.dy = (Math.random()*this.s.ymax) * (Math.random() < .5 ? -1 : 1);
        this.hl = (this.s.ttl/rint)*(this.r/this.s.rmax);
        this.rt = Math.random()*this.hl;
        this.s.rt = Math.random()+1;
        this.stop = Math.random()*.2+.4;
        this.s.xdrift *= Math.random() * (Math.random() < .5 ? -1 : 1);
        this.s.ydrift *= Math.random() * (Math.random() < .5 ? -1 : 1);
    }

    this.fade = function() {
        this.rt += this.s.rt;
    }

    this.draw = function() {
        if(this.s.blink && (this.rt <= 0 || this.rt >= this.hl)) this.s.rt = this.s.rt*-1;
        else if(this.rt >= this.hl) this.reset();
        var newo = 1-(this.rt/this.hl);
        context.beginPath();
        context.arc(this.x,this.y,this.r,0,Math.PI*2,true);
        context.closePath();
        var cr = this.r*newo;
        g = context.createRadialGradient(this.x,this.y,0,this.x,this.y,(cr <= 0 ? 1 : cr));
        g.addColorStop(0.0, 'rgba(255,255,255,'+newo+')');
        g.addColorStop(this.stop, 'rgba(77,101,181,'+(newo*.6)+')');
        g.addColorStop(1.0, 'rgba(77,101,181,0)');
        context.fillStyle = g;
        context.fill();
    }

    this.getX = function() { return this.x; }
    this.getY = function() { return this.y; }
}

function drawStars(context) {
    context.clearRect(0,0,context.canvas.width,context.canvas.height);
    for(var i = 0; i < numStars; i++) {
        pxs[i] = new Star(context);
        pxs[i].reset();
        pxs[i].draw();
    }
}

$(document).ready(function() {
    var canvas = document.getElementsByTagName("canvas")[0];
    
    // resize the canvas to fill browser window dynamically
    window.addEventListener('resize', resizeCanvas, false);

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        var context = canvas.getContext('2d');
        
        /*var lingrad = context.createLinearGradient(0,0,0,window.innerHeight);
        lingrad.addColorStop(0, '#040429');
        lingrad.addColorStop(0.5, '#257eb7');
        */
        
        drawStars(context);

    }
    resizeCanvas();

});