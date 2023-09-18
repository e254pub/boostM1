# Kubernetes
Kubernetes - это открытая система управления контейнерами, которая позволяет автоматизировать развертывание, масштабирование и управление контейнеризированными приложениями. Для запуска stateless веб-сервиса в Kubernetes вам понадобятся следующие базовые компоненты:

1. Pod: Pod - это наименьшая единица развертывания в Kubernetes. Он содержит один или более контейнеров, которые запускаются на одной физической или виртуальной машине. В случае stateless веб-сервиса, вы могли бы создать Pod с одним контейнером, который содержит ваше веб-приложение.

2. Deployment: Deployment - это объект, который позволяет определить желаемое состояние подов и обеспечивает их автоматическое масштабирование и обновление. Создание объекта Deployment позволит вам управлять развертыванием вашего веб-сервиса.

3. ReplicaSet: ReplicaSet - это объект, который определяет количество реплик (копий) одного и того же пода, которые должны быть запущены в кластере. Он гарантирует, что указанное количество подов всегда будет работать и компенсирует потерю подов.

4. Service: Service - это объект, который предоставляет стабильный IP-адрес и доменное имя для доступа к подам, работающим в кластере. Вы можете создать сервис, чтобы ваш веб-сервис был доступен для других сервисов или сторонних запросов.

5. Ingress: Ingress - это объект, который позволяет управлять внешним доступом к сервисам в вашем кластере Kubernetes. Он может настраиваться для маршрутизации входящих запросов на соответствующие сервисы в кластере.

Вышеупомянутые компоненты необходимо описать с использованием YAML-файлов и применить их к вашему кластеру с помощью утилиты kubectl (инструмент командной строки для работы с Kubernetes). 

# Запуск stateless веб-сервис в Kubernetes
Чтобы запустить stateless веб-сервис в Kubernetes, понадобится несколько ресурсов: pod, deployment, replica set, service и ingress.

Примеры файлов конфигурации YAML для этих ресурсов:

1. Pod.yaml:
```yaml
apiVersion: v1
kind: Pod
metadata:
  name: my-web-app
spec:
  containers:
    - name: my-web-app
      image: your-image:tag
      ports:
        - containerPort: 80
```

2. Deployment.yaml:
```yaml
apiVersion: apps/v1
kind: Deployment
metadata:
  name: my-web-app-deployment
spec:
  replicas: 3
  selector:
    matchLabels:
      app: my-web-app
  template:
    metadata:
      labels:
        app: my-web-app
    spec:
      containers:
        - name: my-web-app
          image: your-image:tag
          ports:
            - containerPort: 80
```

3. ReplicaSet.yaml:
```yaml
apiVersion: apps/v1
kind: ReplicaSet
metadata:
  name: my-web-app-replicaset
spec:
  replicas: 3
  selector:
    matchLabels:
      app: my-web-app
  template:
    metadata:
      labels:
        app: my-web-app
    spec:
      containers:
        - name: my-web-app
          image: your-image:tag
          ports:
            - containerPort: 80
```


4. Service.yaml:
```yaml
apiVersion: v1
kind: Service
metadata:
  name: my-web-app-service
spec:
  selector:
    app: my-web-app
  ports:
    - protocol: TCP
      port: 80
      targetPort: 80
```

5. Ingress.yaml:
```yaml
apiVersion: networking.k8s.io/v1
kind: Ingress
metadata:
  name: my-web-app-ingress
spec:
  rules:
    - http:
        paths:
          - path: /
            pathType: Prefix
            backend:
              service:
                name: my-web-app-service
                port:
                  number: 80
```

Вы можете сохранить каждый файл конфигурации в файле с соответствующим именем, например, Pod.yaml, Deployment.yaml и т.д. 
Затем вы можете применить их в Kubernetes с помощью команды 
```shell
kubectl apply -f <path_to_file>.
```

Например, для применения файла Pod.yaml вы можете выполнить команду.
```shell
kubectl apply -f Pod.yaml
```

После этого Kubernetes запустит ваш веб-сервис в нескольких экземплярах (определенных количеством реплик в ресурсе Deployment или ReplicaSet) и создаст сервис и входную точку для доступа к вашему веб-сервису извне.