//: Playground - noun: a place where people can play

import UIKit

/* 
 Función de Distancia entre dos puntos en un plano cartesiano
 donde:
 
 d = distancia
 Desarrollado por: Claudio Vega J.
 
 */

func distancia(x1: Int, x2: Int, y1: Int, y2: Int) -> Float {
    
    //
    let d : Float = Float(sqrt(Double(Int(pow(Float(x2) - Float(x1),Float(2))) + Int(pow(Float(y2) - Float(y1),Float(2))))))
    
    return d
}

/*
 
Calcule la distancia entre los puntos (3,0) y (-7,4)
 
*/

distancia(x1: 3, x2: -7, y1:0 , y2: 4)

sqrt(116)