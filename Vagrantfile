# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # Общий конфиг для всех машин
  config.vm.box = "generic/alpine38" # Можно использовать другую версию Alpine
  config.vm.box_check_update = false

  # Установка Docker через shell-провижнер
  config.vm.provision "shell", inline: <<-SHELL
    apk update
    apk add docker
    rc-update add docker boot
    service docker start
    # Добавляем пользователя vagrant в группу docker (опционально)
    adduser vagrant docker
  SHELL

  # Конфигурация для каждой машины
  (1..3).each do |i|
    config.vm.define "alpine-#{i}" do |node|
      node.vm.hostname = "alpine-#{i}"
      node.vm.network "private_network", ip: "192.168.56.1#{i}"

      # Настройки ресурсов (можно изменить под свои нужды)
      node.vm.provider "virtualbox" do |vb|
        vb.memory = "1024"
        vb.cpus = 1
        vb.name = "alpine-#{i}"
      end
    end
  end
end
