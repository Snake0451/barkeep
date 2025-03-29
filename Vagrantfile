# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # Общий конфиг для всех машин
  config.vm.box = "debian/bookworm64"
  config.vm.box_check_update = false

  # Установка Docker, Zsh и дополнительных пакетов
  config.vm.provision "shell", inline: <<-SHELL
    # Обновление системы
    apt-get update -y
    apt-get upgrade -y

    # Установка зависимостей для Docker
    apt-get install -y \
        ca-certificates \
        curl \
        gnupg \
        lsb-release

    # Добавление GPG-ключа Docker
    mkdir -p /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/debian/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg

    # Добавление репозитория Docker
    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian \
      $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null

    # Установка Docker
    apt-get update -y
    apt-get install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin

    # Добавление пользователя vagrant в группу docker
    usermod -aG docker vagrant

    # Установка Zsh и Oh My Zsh
    apt-get install -y zsh git curl
    sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" "" --unattended

    # Смена оболочки по умолчанию для пользователя vagrant
    chsh -s /bin/zsh vagrant
  SHELL

  # Конфигурация для каждой машины
  (1..3).each do |i|
    config.vm.define "debian-#{i}" do |node|
      node.vm.hostname = "debian-#{i}"
      node.vm.network "private_network", ip: "192.168.56.2#{i}"

      # Настройки ресурсов (можно изменить)
      node.vm.provider "virtualbox" do |vb|
        vb.memory = "1024"
        vb.cpus = 1
        vb.name = "debian-#{i}"
      end
    end
  end
end
