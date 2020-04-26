# 1.1什么是设计模式
设计模式是面向对象设计中特定场景下的特定解决方案。
设计模式是在1994年代由Erich Gamma（GOF四人帮，Gang of Four）等人从建筑设计领域引入到计算机科学中来的。
软件设计模式使人们可以更加简单方便复用成功的设计和体系结构，它通常包含以下几个基本要素：模式名称、别名、动机、问题、解决方案、效果、模式角色、合作关系、实现方法、实用性、已知应用、例程、模式扩展和相关模式等

# 1.2模式的分类
## 创建型模式
用于描述“怎么创建对象”。它的主要特点是“将对象的创建与使用分离”。如，单例、原型、工厂方法、抽象工厂、建造者等5种创建型模式。

## 结构型模式
用于描述“如何将类或对象按某种布局组成更大的结构”。如，代理、适配器、桥接、装饰、外观、享元、组合等7种结构型模式。

## 行为型模式
用于描述“类或对象之间怎样相互协作共同完成单个对象无法单独完成的任务，以及怎样分配职责”。如，模板方法、策略、命令、职责链、状态、观察者、中介者、迭代器、访问者、备忘录模式、解释器等11中行为模式。

# 1.3模式的功能简介
前面说明了这23种设计模式的分类，下面是对各个模式的功能进行介绍。
## 1）单例（Singleton）模式
某个类只能生成一个实例，该类提供了一个全局访问点，供外部获取该实例，其拓展是有限多个实例。
## 2）原型（Prototype）模式
将一个对象作为原型，通过对其进行复制而克隆出多个和原型类似的新实例。
## 3）工厂方法（Factory Method）模式
定义一个用户创建产品的接口，由子类决定生产什么产品。
## 4）抽象工厂（Abstract Factory）模式
提供一个创建产品族的接口（抽象类），其每个子类可以生产一些列相关的产品。
## 5）建造者（Builder）模式
将一个复杂对象分解成多个相对简单的部分，然后根据不同需要分别创建它们，最后构建成该复杂对象。
## 6）代理（Proxy）模式
为某个对象提供一种代理以控制对对象的访问。即客户端通过代理间接地访问该对象，从而限制、增强或修改该对象的一些特征。
## 7）适配器（Adapter）模式
让原来不兼容的两个接口协同工作。
## 8）桥接（Bridge）模式
将抽象与实现分离，使它们可以独立变化。它是用组合关系代替继承关系来实现，从而降低 抽象和实现这两个可变维度的耦合度。
## 9）装饰（Decorator）模式
动态的给对象增加一些职责，即增加其额外的功能。
## 10）外观（Facade）模式
为多个复杂的子系统提供一个一致的接口，使这些子系统更加容易被访问。
## 11）享元（Flyweight）模式
运用共享技术来有效地支持大量细粒度对象的复用。
## 12）组合（Composite）模式
将对象组合成树状层次结构，使用户对单个对象和组合对象具有一致的访问性。
## 13）模板方法（Tempplate Method）模式
定义一个操作中的算法骨架，而将算法的一些步骤延迟到子类中，使得子类可以不改变该算法结构的情况下重定义该算法的某些特点步骤。
## 14）策略（Strategy）模式
定义了一系列算法，并将每个算法封装起来，使它们可以相互替换，且算法的改变不会影响算法的客户。
## 15）命令（Command）模式
将一个请求封装为一个对象，使发出请求的责任和执行请求的责任分割开。
## 16）职责链（Chain of Responsibility）模式
把请求从链中的一个对象传到下一个对象，直到请求被响应为止。通过这个方式去除对象之间的耦合。
## 17）状态（State）模式
允许一个对象在其内部状态发生改变时改变其行为能力。
## 18）观察者（Observer）模式
多个对象间存在一对多的关系，当一个对象发生改变时，把这种改变通知给其他多个对象，从而影响其它对象的行为。
## 19）中介者（Mediator）模式
定义一个中介对象来简化原有对象之间的交互关系，降低系统中对象的耦合度，使原有对象之间不必户互了解。
## 20）迭代器（Iterator）模式
提供一种方法来顺序访问聚合对象中的一系列数据，而不暴露聚合对象的内部表示。
## 21）访问者（Visitor）模式
在不改变集合元素的前提下，为一个集合中的每个元素提供多种访问方式，即每个元素有多个访问者对象。
## 22）备忘录（Memento）模式
在不破坏封装性的前提下，获取并保存一个对象的内部状态，以便以后回复它。
## 23）解释器（Interpreter）
提供如何定义语言的文法，以及对语言句子的解释方法，即解释器。
 
必须指出，这 23 种并设计模式不是孤立存在的，很多模式之间存在一定的关联关系，在大的系统开发中常常同时使用多种设计模式