# Copilot Do Something - Modern PHP Backend Architecture

[![CI/CD Pipeline](https://github.com/SteelQ/copilot-do-something/workflows/CI/CD%20Pipeline/badge.svg)](https://github.com/SteelQ/copilot-do-something/actions)
[![PHP Version](https://img.shields.io/badge/PHP-%5E8.1-blue.svg)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com/)

一个基于 Laravel 框架的现代化 PHP 后端开发架构，包含完整的开发环境配置、代码质量工具、测试框架和 CI/CD 流程。

## 🚀 特性

- **Laravel 10.x**: 最新的 Laravel 框架，提供现代化的 PHP 开发体验
- **RESTful API**: 标准化的 API 设计，包含健康检查和用户管理等端点
- **Docker 支持**: 完整的 Docker 开发环境配置
- **代码质量工具**: 
  - PHP CS Fixer 代码格式化
  - PHPStan 静态分析
  - Laravel Pint 代码风格检查
- **测试框架**: PHPUnit 单元测试和功能测试
- **CI/CD**: GitHub Actions 自动化测试和部署
- **开发工具**: Artisan 命令行工具，数据库迁移等

## 📁 项目结构

```
copilot-do-something/
├── app/                    # 应用核心代码
│   ├── Console/           # Artisan 命令
│   ├── Exceptions/        # 异常处理
│   ├── Http/              # HTTP 层
│   │   ├── Controllers/   # 控制器
│   │   │   └── Api/      # API 控制器
│   │   └── Middleware/   # 中间件
│   ├── Models/            # 数据模型
│   └── Providers/         # 服务提供者
├── bootstrap/             # 应用启动文件
├── config/                # 配置文件
├── database/              # 数据库相关
│   ├── migrations/        # 数据库迁移
│   ├── seeders/          # 数据填充
│   └── factories/        # 模型工厂
├── docker/                # Docker 配置
├── public/                # Web 根目录
├── resources/             # 资源文件
├── routes/                # 路由定义
├── storage/               # 存储目录
├── tests/                 # 测试文件
├── .github/workflows/     # GitHub Actions CI/CD
├── docker-compose.yml     # Docker Compose 配置
├── Dockerfile            # Docker 镜像配置
└── composer.json         # PHP 依赖管理
```

## 🛠️ 快速开始

### 环境要求

- PHP 8.1+
- Composer
- Node.js (可选，用于前端资源)
- Docker & Docker Compose (推荐)

### 1. 使用 Docker (推荐)

```bash
# 克隆项目
git clone https://github.com/SteelQ/copilot-do-something.git
cd copilot-do-something

# 启动 Docker 服务
docker-compose up -d

# 安装依赖
docker-compose exec app composer install

# 生成应用密钥
docker-compose exec app php artisan key:generate

# 运行数据库迁移
docker-compose exec app php artisan migrate

# 访问应用
curl http://localhost:8000/test.php
```

### 2. 本地开发环境

```bash
# 克隆项目
git clone https://github.com/SteelQ/copilot-do-something.git
cd copilot-do-something

# 安装依赖
composer install

# 复制环境变量文件
cp .env.example .env

# 生成应用密钥
php artisan key:generate

# 配置数据库连接（编辑 .env 文件）
# 运行数据库迁移
php artisan migrate

# 启动开发服务器
php artisan serve
```

## 📡 API 端点

### 基础端点

- `GET /test.php` - 简单的 API 测试端点
- `GET /health` - 应用健康检查
- `GET /api/status` - 详细系统状态

### API v1 端点

- `GET /api/v1/users` - 获取用户列表
- `POST /api/v1/users` - 创建新用户
- `GET /api/v1/users/{id}` - 获取特定用户
- `PUT /api/v1/users/{id}` - 更新用户信息
- `DELETE /api/v1/users/{id}` - 删除用户

### 示例请求

```bash
# 测试 API
curl http://localhost:8000/test.php

# 健康检查
curl http://localhost:8000/health

# 获取用户列表
curl http://localhost:8000/api/v1/users
```

## 🧪 测试

```bash
# 运行所有测试
composer test

# 运行单元测试
./vendor/bin/phpunit tests/Unit

# 运行功能测试
./vendor/bin/phpunit tests/Feature

# 测试覆盖率报告
composer test-coverage
```

## 🔧 代码质量

```bash
# 代码格式化
composer cs-fix

# 代码风格检查
composer cs-check

# 静态分析
composer stan

# Laravel Pint
composer pint
```

## 📦 生产部署

### 使用 Docker

```bash
# 构建生产镜像
docker build -t copilot-do-something .

# 运行容器
docker run -d -p 8000:80 copilot-do-something
```

### 传统部署

```bash
# 安装生产依赖
composer install --no-dev --optimize-autoloader

# 缓存配置
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 运行数据库迁移
php artisan migrate --force
```

## 🔄 CI/CD

项目包含完整的 GitHub Actions CI/CD 流程：

- **自动测试**: 每次推送和 PR 都会触发测试
- **代码质量检查**: PHPStan 和 PHP CS Fixer 检查
- **Docker 镜像构建**: 主分支自动构建 Docker 镜像

## 📚 开发指南

### 添加新的 API 端点

1. 在 `app/Http/Controllers/Api/` 创建控制器
2. 在 `routes/api.php` 中定义路由
3. 在 `tests/Feature/` 中添加测试

### 数据库迁移

```bash
# 创建迁移文件
php artisan make:migration create_example_table

# 运行迁移
php artisan migrate

# 回滚迁移
php artisan migrate:rollback
```

### 创建模型

```bash
# 创建模型
php artisan make:model Example

# 创建模型和迁移
php artisan make:model Example -m
```

## 🤝 贡献

1. Fork 项目
2. 创建功能分支 (`git checkout -b feature/AmazingFeature`)
3. 提交更改 (`git commit -m 'Add some AmazingFeature'`)
4. 推送到分支 (`git push origin feature/AmazingFeature`)
5. 创建 Pull Request

## 📄 许可证

本项目基于 MIT 许可证，详情请见 [LICENSE](LICENSE) 文件。

## 📧 联系方式

- 作者: SteelQ
- 邮箱: admin@steelq.com
- 项目地址: https://github.com/SteelQ/copilot-do-something

---

**现代化的 PHP 后端开发架构，助力快速构建高质量的 Web 应用程序！**
